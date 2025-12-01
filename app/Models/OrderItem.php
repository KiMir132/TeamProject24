<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = null;
    protected $fillable = ['OrderID','ProductID','Quantity','Price'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'OrderID', 'OrderID');
    }
}