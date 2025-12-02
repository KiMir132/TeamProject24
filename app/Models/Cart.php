<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CartItems;

class Cart extends Model
{
    protected $table = 'cart';
    protected $primarykey = 'CartID';
    protected $fillable = ['UID','Total_Price'];

    public function items()
    {
        return $this->hasMany(CartItems::class, 'CartID', 'CartID');
    }
}