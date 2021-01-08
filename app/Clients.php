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

    public function getInvoice()
    {
        return $this->hasMany('App\MasInvoice','client_id','id');
    }

    public static function updateClientsDetails($id,$post)
    {
   		try{
    		$getClientDetail = Self::find($id);
    		$getClientDetail->client_description = $post['client_description'];
    		
    		
    		if($getClientDetail->save())
    		{
    			return true;
    		}
    	}
    	 catch(\Exception $e)
        {
            $result['success'] = false;
            $result['error'] = $e->getMessage();
            return $result;
        }
    }
}
