<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'ReviewId';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'ProductID',
        'UID',
        'Rating',
        'Description',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
    }

    public function user(){
        return $this->belongsTo(User::class, 'UID', 'UID');
    }
}
