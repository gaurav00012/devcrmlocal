<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterTask extends Model
{
    //
    protected $table = 'master_tasks';
    protected $primaryKey = 'task_id';
    protected $fillable = [
        'task_name','company_id', 'project_id','task_status','task_description','task_progress','due_date','is_attachment','position','created_by'
    ];
}
