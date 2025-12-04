document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        document.getElementById('responseMessage').style.display = 'block';
        this.reset();
    });