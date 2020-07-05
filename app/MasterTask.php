<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class MasterTask extends Model
{
    //
    protected $table = 'master_tasks';
    protected $primaryKey = 'task_id';
    protected $fillable = [
        'task_name','company_id', 'project_id','task_status','task_description','task_progress','due_date','is_attachment','position','created_by'
    ];

    public function getAssignee()
    {
        return $this->hasMany('App\TaskAssignee','task_id','task_id');
    }

    public function getTaskAttachments()
    {
        return $this->hasMany('App\MasterTaskAttachments','task_id','task_id');
    }

    public function getTaskComment()
    {
        return $this->hasMany('App\MasterTaskComment','task_id','task_id');
    }

    public function getTaskStatus(){
        return $this->hasOne('App\MasterDropDowns','id','task_status');
    }

    public static function getCompletedTask()
    {
        $user = Auth::user();
        //$completeTask = DB::select('SELECT mt.*, mta.* FROM master_tasks mt INNER JOIN mas_task_assignee mta ON mt.task_id = mta.`task_id` WHERE task_status = 3 AND mta.assignee = 2');
        return DB::select('SELECT mt.*,mtas.* FROM `master_tasks` mt INNER JOIN mas_task_assignee mtas ON mt.task_id = mtas.`task_id` WHERE mtas.assignee = '.$user->id.' AND mt.`task_status` = 3 ORDER BY mt.position ASC');

    }
}
