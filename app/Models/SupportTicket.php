<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    protected $table = 'support_tickets';

    protected $fillable = [
        'reference',
        'name',
        'email',
        'category',
        'order_number',
        'message',
        'rating',
        'status',
    ];
}
