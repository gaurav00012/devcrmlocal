<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterProject extends Model
{
    //
    protected $table = 'mas_projects';
    protected $fillable = [
        'project_name', 'description','company_id',
    ];
}
