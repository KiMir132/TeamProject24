<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordResetController extends Controller
{
    public function showForm()
    {
        return view('auth.forgot-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|exists:users,email',
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
            'email.exists'   => 'No account found with that email address.',
            'password.regex' => 'Password must include uppercase, lowercase, a number and a special character (@$!%*#?&).',
        ]);

        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')
            ->with('status', 'Password updated successfully. You can now log in.');
    }
}