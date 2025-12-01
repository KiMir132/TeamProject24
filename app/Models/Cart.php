<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $primarykey = 'CartID';
    protected $fillable = ['UID','Total_Price'];

    public function items()
    {
        return $this->hasMany(CartItem::class, 'CartID', 'CartID');
    }
}