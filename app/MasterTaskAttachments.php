<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterTaskAttachments extends Model
{
    protected $table = 'mas_task_attachments';
    protected $fillable = [
        'task_id', 'file_name','created_at','created_by','updated_at','updated_by',
    ];
}
