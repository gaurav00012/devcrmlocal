<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasInvoiceItemDetail extends Model
{
    protected $table = 'invoice_item_detail';
     protected $fillable = [
        'id','invoice_id','item_name','quantity','price','amount','created_at','created_by','updated_by','updated_at'
    ];
}
