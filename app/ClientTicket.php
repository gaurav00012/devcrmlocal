<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientTicket extends Model
{
    //
    protected $table = 'mas_ticket';
     protected $fillable = [
        'user_id','client_id','company_id','subject','description','created_at','created_by','updated_by','updated_at'
    ];
}
