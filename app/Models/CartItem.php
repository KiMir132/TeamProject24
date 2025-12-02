<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_items';
    protected $primaryKey = 'CartItemID';
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