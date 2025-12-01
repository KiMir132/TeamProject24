<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'ProductID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['Name','Description','Price','Quantity','Type'];

    
    public function scopeSearch($query, $term = null)
    {
        if (empty($term)) {
            return $query;
        }

        $term = "%{$term}%";

        return $query->where(function ($q) use ($term) {
            $q->where('Name', 'LIKE', $term)
              ->orWhere('Description', 'LIKE', $term)
              ->orWhere('Type', 'LIKE', $term);
        });
    }

   
    public function scopePriceBetween($query, $min = null, $max = null)
    {
        if (!is_null($min)) {
            $query->where('Price', '>=', $min);
        }

        if (!is_null($max)) {
            $query->where('Price', '<=', $max);
        }

        return $query;
    }
}

