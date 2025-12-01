<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function showForm(): View
    {
        return view('login');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $account = $request->only('email','password');
        if(Auth::attempt($account)){
            auth()->user()->UID;
            return redirect('/')
                ->with('status','Successfully Logged in');
        }

        return back()->withInput();
    }

    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}