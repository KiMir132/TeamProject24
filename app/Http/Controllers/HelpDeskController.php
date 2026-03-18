<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportTicket;
use Illuminate\Support\Str;

class HelpDeskController extends Controller
{
    public function index()
    {
        return view('helpdesk');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'category' => 'required|string',
            'message'  => 'required|string|min:10',
            'rating'   => 'nullable|integer|min:1|max:5',
        ], [
            'message.min' => 'Please provide at least 10 characters in your message.',
        ]);

        $reference = 'EQ-' . strtoupper(Str::random(8));

        SupportTicket::create([
            'reference'    => $reference,
            'name'         => $request->name,
            'email'        => $request->email,
            'category'     => $request->category,
            'order_number' => $request->order_number,
            'message'      => $request->message,
            'rating'       => $request->rating,
            'status'       => 'open',
        ]);

        return back()->with([
            'success'   => true,
            'reference' => $reference,
        ]);
    }
}