document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const msg = document.getElementById('responseMessage');
    msg.style.display = 'flex';
    msg.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    this.reset();
});