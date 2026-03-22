<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::orderBy('Name')->paginate(12);
        $types = Product::select('Type')->distinct()->orderBy('Type')->pluck('Type');

        return view('products.index', compact('products', 'types'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('q');
        $minPrice   = $request->input('min_price');
        $maxPrice   = $request->input('max_price');
        $type       = $request->input('type');

        $products = Product::query()
            ->search($searchTerm)
            ->priceBetween($minPrice, $maxPrice)
            ->when($type, fn($q) => $q->where('Type', $type))
            ->orderBy('Name')
            ->paginate(12)
            ->appends($request->all());

        $types = Product::select('Type')->distinct()->orderBy('Type')->pluck('Type');

        return view('products.search', [
            'products'   => $products,
            'searchTerm' => $searchTerm,
            'minPrice'   => $minPrice,
            'maxPrice'   => $maxPrice,
            'types'      => $types,
        ]);
    }
     public function show($id)
    {
        $product = Product::with(['reviews.user'])->findOrFail($id);

        $related = Product::where('Type', $product->Type)
            ->where('ProductID', '!=', $product->ProductID)
            ->take(4)
            ->get();

        $reviewCount = $product->reviews->count();
        $averageRating = $reviewCount ? round($product->reviews->avg('Rating'), 1) : 0;

        return view('products.show', compact('product', 'related', 'reviewCount', 'averageRating'));
    }
}