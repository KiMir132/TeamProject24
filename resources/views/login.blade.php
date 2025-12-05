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
        <form action="">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" reqiured>
                <i class='bx bx-user' ></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Password" reqiured>
                <i class='bx bx-lock-alt' ></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>

        </form>
    </div>
</body>



</html>
