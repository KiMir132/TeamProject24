<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_item';
    protected $primarykey = 'CartItemID';
    protected $fillable = ['Quantity','Price','CartID','ProductID'];
}