<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientForm extends Model
{
    protected $table = 'client_form';
     protected $fillable = ['id',
        'company_name','contact_person','email','mailing_address','about_business','domain_name','hosting_access','hosting_email','content','copy','primary_goal','target_geographic','target_audience','describe_word_1','describe_word_2','describe_word_3','company_colors','navigation','competitors','reference','company_logo','additional_notes','ip','created_at','created_by','updated_at','updated_by'	
    ];

    public static function updateClientDetail($id,$post)
    {	
    	try{
    	
    		$getFormDetail = Self::find($id);
    		$getFormDetail->company_name = $post['company_name'];
    		//$getFormDetail->email = $post['company_email'];
    		$getFormDetail->about_business = $post['about_business'];
    		$getFormDetail->mailing_address = $post['mailing_address'];
    		$getFormDetail->domain_name = $post['domain_name'];
    		$getFormDetail->hosting_access = $post['hosting_access'];
    		$getFormDetail->hosting_email = $post['hosting_email'];
    		$getFormDetail->content = $post['content'];
    		$getFormDetail->copy = $post['copy'];
    		$getFormDetail->primary_goal = $post['primary_goal'];
    		$getFormDetail->target_geographic = $post['target_geographic'];
    		$getFormDetail->target_audience = $post['target_audience'];
    		$getFormDetail->describe_word_1 = $post['describe_word_1'];
    		$getFormDetail->describe_word_2 = $post['describe_word_2'];
    		$getFormDetail->describe_word_3 = $post['describe_word_3'];
    		$getFormDetail->company_colors  = $post['company_colors'];
    		$getFormDetail->navigation = $post['navigation'];
    		$getFormDetail->competitors = $post['competitors'];
    		$getFormDetail->reference = $post['reference'];
    		$getFormDetail->additional_notes = $post['additional_notes'];
    		
    		if($getFormDetail->save())
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
