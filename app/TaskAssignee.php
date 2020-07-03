<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskAssignee extends Model
{
    protected $table = 'mas_task_assignee';
    protected $fillable = [
        'task_id', 'assignee','created_at','created_by','updated_at','updated_by',
    ];

    public function getTask()
    {
        return $this->belongsTo('App\MasterTask','task_id','task_id');
    }

    
}
