<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
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
    <form method="POST" action="{{ route('register.validate') }}">
        @csrf

        <h1>Register</h1>

        
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

        <button type="submit" class="btn">Sign-Up</button>
    </form>
</div>

</body>
</html>
