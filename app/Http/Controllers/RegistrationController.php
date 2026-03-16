<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Hash;

class RegistrationController extends Controller
{
    public function showForm(): View
    {
        return view('register');
    }

  public function validateForm(Request $request): RedirectResponse
{
 $request->validate([
    'name'     => 'required|string|max:50',
    'email'    => 'required|string|email|unique:users',
    'password' => [
        'required',
        'string',
        'min:8',
        'confirmed',
        'regex:/[A-Z]/',
        'regex:/[a-z]/',
        'regex:/[0-9]/',
        'regex:/[@$!%*#?&]/',
    ],
], [
    'password.min'     => 'Password must be at least 8 characters.',
    'password.regex'   => 'Password must include uppercase, lowercase, a number and a special character (@$!%*#?&).',
    'password.confirmed' => 'Passwords do not match.',
]);

    $user = User::Create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    auth()->login($user);

    return redirect('/')
        ->with('status', 'Successfully registered an account');
}
}
