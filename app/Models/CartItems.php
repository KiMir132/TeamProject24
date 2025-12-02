<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    protected $table = 'cart_items';
    protected $primarykey = 'CartItemID';
    protected $fillable = ['Quantity','Price','CartID','ProductID'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'CartID', 'CartID');
    }
}