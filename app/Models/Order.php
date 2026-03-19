<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'OrderID';
    public $timestamps = true;

    protected $fillable = [
        'UID',
        'Order_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UID', 'UID');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'OrderID', 'OrderID');
    }
}