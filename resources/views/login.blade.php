<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar">
    <ul class="nav-links">
        <li><a href="/">Home</a></li>

        <li class="dropdown">
            <a href="#">User ▾</a>
            <ul class="dropdown-menu">
                <li><a href="/register">Registration</a></li>
                <li><a href="/login">Login</a></li>
                <li><a href="/orders">Orders history</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#">Information ▾</a>
            <ul class="dropdown-menu">
                <li><a href="/about">About Us</a></li>
                <li><a href="/contact">Contact Us</a></li>
                <li><a href="#">Terms &amp; Conditions</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#">Support ▾</a>
            <ul class="dropdown-menu">
                <li><a href="#">Live chat</a></li>
                <li><a href="#">Help desk / Feedback</a></li>
            </ul>
        </li>
    </ul>
</nav>

<div class="wrapper">

    {{-- REAL LARAVEL LOGIN FORM --}}
    <form method="POST" action="{{ route('login.login') }}">
        @csrf
        
        <h1>Login</h1>

        {{-- Email --}}
        <div class="input-box">
            <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <i class='bx bx-user'></i>
        </div>

        {{-- Password --}}
        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bx-lock-alt'></i>
        </div>

        {{-- Laravel validation error display --}}
        @if ($errors->any())
            <div class="errors" style="color:red; margin-bottom:10px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="remember-forgot">
            <label><input type="checkbox" name="remember"> Remember me</label>
            <a href="#">Forgot password?</a>
        </div>

        <button type="submit" class="btn">Login</button>

        <div class="register-link">
            <p>Don't have an account? <a href="/register">Register</a></p>
        </div>

    </form>
</div>

</body>
</html>
