<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::orderBy('Name')
            ->paginate(12);

        return view('products.index', compact('products'));
    }

    
    public function search(Request $request)
    {
        $searchTerm = $request->input('q');        
        $minPrice   = $request->input('min_price'); 
        $maxPrice   = $request->input('max_price');
        $products = Product::query()
            ->search($searchTerm)                   
            ->priceBetween($minPrice, $maxPrice)   
            ->orderBy('Name')
            ->paginate(12)
            ->appends($request->all());             

        return view('products.search', [
            'products'   => $products,
            'searchTerm' => $searchTerm,
            'minPrice'   => $minPrice,
            'maxPrice'   => $maxPrice,
        ]);
    }
}