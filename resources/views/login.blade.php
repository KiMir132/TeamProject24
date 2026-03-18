@extends('layouts.app')

@section('title', 'Login – E-Quipment')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="login-page">
<div class="wrapper">
    <form method="POST" action="{{ route('login.login') }}">
        @csrf
        <h1>Login</h1>

        <div class="input-box">
            <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <i class='bx bx-user'></i>
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bx-lock-alt'></i>
        </div>

        @if ($errors->any())
            <div class="errors">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="remember-forgot">
            <label><input type="checkbox" name="remember"> Remember me</label>
            <a href="{{ route('password.request') }}">Forgot password?</a>
        </div>

        <button type="submit" class="btn">Login</button>

        <div class="register-link">
            <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </form>
</div>
</div>
@endsection