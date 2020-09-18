<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterCompany extends Model
{
    //
    protected $table = 'mas_companies';
    protected $fillable = [
        'company_name','user_id','description',
    ];

    public function findCompany()
    {
    	return $this->hasMany('App\MasterProject', 'company_id', 'id');
    }

    public function getUser()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }
}
