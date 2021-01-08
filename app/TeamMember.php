<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $table = 'mas_team';
    protected $fillable = [
        'id','user_id','company_id','created_by','updated_at','updated_by',
    ];
}
