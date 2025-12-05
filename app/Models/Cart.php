<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CartItem;

class Cart extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'CartID';
    public $incrementing = true;
    protected $fillable = ['UID','Total_Price'];

    public function items()
    {
        return $this->hasMany(CartItem::class, 'CartID', 'CartID');
    }
}