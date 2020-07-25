<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientForm extends Model
{
    protected $table = 'client_form';
     protected $fillable = [
        'company_name','contact_person','email','mailing_address','about_business','domain_name','hosting_access','hosting_email','content','copy','primary_goal','target_geographic','target_audience','describe_word_1','describe_word_2','describe_word_3','company_colors','navigation','competitors','reference','company_logo','additonal_notes','ip','created_at','created_by','updated_at','updated_by'	
    ];
}
