<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primarykey = 'ProductID';
    protected $fillable = ['Quantity','Price','Name','Description','Type'];
}