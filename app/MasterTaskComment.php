<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterTaskComment extends Model
{
    //
    protected $table = 'mas_task_comment';
    protected $fillable = [
         'task_id','task_comments','created_by','updated_at','updated_by','created_at',
    ];
}
