<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterTaskComment extends Model
{
    //
    protected $table = 'mas_task_comment';
    protected $fillable = [
         'task_id','task_comments','edit_count','created_by','updated_at','updated_by','created_at',
    ];

    public function getUserName()
    {
        return $this->hasOne('App\User','id','created_by');
    }

    public function getCommentAttachment()
    {
    	return $this->hasMany('App\MasterTaskCommentAttachment','task_comment_id','id');
    }
}
