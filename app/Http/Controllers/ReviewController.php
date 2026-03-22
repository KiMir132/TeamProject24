<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $product)
    {
        $request->validate([
            'Rating' => 'required|numeric|min:1|max:5',
            'Description' => 'nullable|string|max:1000',
        ]);

        Review::create([
            'ProductID' => $product,
            'UID' => Auth::user()->UID,
            'Rating' => $request->Rating,
            'Description' => $request->Description,
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
}
