<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
    protected $table = 'mas_ticket_comment';
    protected $fillable = [
        'id','ticket_id','comment','commented_by','created_at','created_by','updated_at','updated_by',
    ];
}
