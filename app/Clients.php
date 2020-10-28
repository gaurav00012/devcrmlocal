<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table = 'mas_client';
    protected $fillable = [
        'client_description','company_id','user_id','created_at','created_by','updated_by','updated_at'
    ];

    public function getUser()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }
}
