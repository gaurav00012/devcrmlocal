<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterCompany extends Model
{
    //
    protected $table = 'mas_companies';
    protected $fillable = [
        'company_name', 'description',
    ];

    public function findCompany()
    {
    	return $this->hasMany('App\MasterProject', 'company_id', 'id');
    }
}
