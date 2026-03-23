<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'OrderID';
    public $timestamps = true;

    protected $fillable = ['Order_date','UID','full_name','email','address_line1','city','zip','TotalPrice','Status'
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