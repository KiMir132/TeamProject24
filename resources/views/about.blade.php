<html>
<head>
    <title>Home</title>
    <style>
        
        nav {
            background: #024c7aff;
            padding: 10px 20px;
            margin-bottom: 20px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 25px;
        }

        nav li {
            position: relative;
        }

        nav > ul > li > a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        
        nav li ul {
            display: none;
            position: absolute;
            background: #333;
            padding: 10px;
            list-style: none;
            margin: 0;
            min-width: 180px;
            z-index: 10;
        }

        nav li:hover ul {
            display: block;
        }

        nav li ul li a {
            display: block;
            color: #fff;
            padding: 5px 0;
            text-decoration: none;
            font-weight: 400;
        }

        nav li ul li a:hover {
            text-decoration: underline;
        }
    </style>
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
    <p>This is the about page.</p>

</div>
