@extends('layouts.app')

@section('title', 'Register – E-Quipment')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="register-page">
<div class="wrapper">
    <form method="POST" action="{{ route('register.validate') }}">
        @csrf
        <h1>Register</h1>

        @if ($errors->any())
            <div class="errors">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="input-box">
            <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
            <i class='bx bx-user'></i>
        </div>

        <div class="input-box">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <i class='bx bx-envelope'></i>
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bx-lock-alt'></i>
        </div>

        <div class="input-box">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <i class='bx bx-lock'></i>
        </div>

        <button type="submit" class="btn">Sign Up</button>

        <div class="register-link">
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </form>
</div>
</div>
@endsection