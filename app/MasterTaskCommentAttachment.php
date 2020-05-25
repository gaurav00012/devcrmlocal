<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterTaskCommentAttachment extends Model
{
    //
    protected $table = 'mas_task_comment_attachment';
     protected $fillable = [
         'task_id','task_comment_id','attachment_name','created_by','updated_at','updated_by','created_at',
    ];
}
