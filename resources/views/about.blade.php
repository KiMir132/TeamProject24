<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
</head>
<body>


<nav>
    <ul>
        <li>
            <a href="{{ url('/') }}">Home</a>
        </li>

        
        <li>
            <a href="#">User ▾</a>
            <ul>
                <li><a href="{{ route('register') }}">Registration</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('orders') }}">Orders history</a></li>
            </ul>
        </li>

        
        <li>
            <a href="{{ route('products.index') }}">Products ▾</a>
            
        </li>

      



       
        <li>
            <a href="#">Information ▾</a>
            <ul>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                <li><a href="#">Terms &amp; Conditions</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </li>

        
        <li>
            <a href="#">Support ▾</a>
            <ul>
                <li><a href="#">Live chat</a></li>
                <li><a href="#">Help desk / Feedback</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div>
    <h1>About Us</h1>
    <p>Welcome to <strong>E-Quipment</strong>, your trusted destination for high-quality computer hardware and components, which are guaranteed to last. Our goal is to make PC building and upgrading simple, accessible, and enjoyable by offering only premium parts that meet our quality standards.</p>
<p>At E-Quipment, we have partnered with many reputable brands and carefully select each item in our store to ensure it delivers the performance, durability, and value our customers expect. Whether you are assembling your first PC or optimising a powerful rig, our expert team is here to support you every step of the way. We provide clear product descriptions, expert recommendations, and a smooth shopping experience so you can find exactly what you nee without the confusion.</p>
<p>If you have any queries send us a message on the <a href="{{route('contact')}}">Contact Us</a> page; our team will be more than happy to assist you.</p>
<p>Are you ready to shop? Why not <a href="{{ route('register')}}">Register</a> and make an account with us. Already have an account? Then <a href="{{ route('login')}}">Log In</a> and jump back in! </p>
</div>
