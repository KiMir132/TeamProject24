<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
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

<div class="page-content contact-form-wrapper">
    <div class="contact-header">
        <h1>Contact Us</h1>
        <p>Need help? Send us a message and we will assist you further.</p>
    </div>

    <div class="container mt-5">
    <form id="contactForm">
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="name" placeholder="Your Name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Your Message</label>
            <textarea class="form-control" id="message" rows="5" placeholder="Your message" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Message</button>
    </form>
    <div id="responseMessage" class="mt-3 text-success" style="display:none;">
        Thank you! Your message has been forwarded to our team, we'll be in touch soon.
    </div>
</div>
</div>

<script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        document.getElementById('responseMessage').style.display = 'block';
        this.reset();
    });
</script>

<footer class="footer" id="contact">
        <div class="footer-inner">
            <div>© {{ date('Y') }} E-Quipment. All rights reserved.</div>
            <div>Need help? Email E-Quipment123@gmail.com</div>
        </div>
</footer>

</body>
</html>


