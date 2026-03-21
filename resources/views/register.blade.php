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
    <input type="password" name="password" id="password" placeholder="Password" required>
    <i class='bx bx-lock-alt'></i>
</div>
<div class="password-strength">
    <div class="strength-bar">
        <div class="strength-fill" id="strengthFill"></div>
    </div>
    <span class="strength-label" id="strengthLabel">Enter a password</span>
</div>
<ul class="password-rules">
    <li id="rule-length">✗ At least 8 characters</li>
    <li id="rule-upper">✗ At least 1 uppercase letter</li>
    <li id="rule-lower">✗ At least 1 lowercase letter</li>
    <li id="rule-number">✗ At least 1 number</li>
    <li id="rule-special">✗ At least 1 special character (@$!%*#?&)</li>
</ul>

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

@section('scripts')
<script>
const passwordInput = document.getElementById('password');
const strengthFill  = document.getElementById('strengthFill');
const strengthLabel = document.getElementById('strengthLabel');

const rules = {
    'rule-length':  val => val.length >= 8,
    'rule-upper':   val => /[A-Z]/.test(val),
    'rule-lower':   val => /[a-z]/.test(val),
    'rule-number':  val => /[0-9]/.test(val),
    'rule-special': val => /[@$!%*#?&]/.test(val),
};

const levels = [
    { label: 'Very Weak', color: '#ef4444', width: '20%' },
    { label: 'Weak',      color: '#f97316', width: '40%' },
    { label: 'Fair',      color: '#eab308', width: '60%' },
    { label: 'Strong',    color: '#22c55e', width: '80%' },
    { label: 'Very Strong', color: '#16a34a', width: '100%' },
];

passwordInput.addEventListener('input', function() {
    const val = this.value;
    let passed = 0;

    Object.entries(rules).forEach(([id, test]) => {
        const el = document.getElementById(id);
        if (test(val)) {
            el.classList.add('passed');
            el.textContent = '✓ ' + el.textContent.slice(2);
            passed++;
        } else {
            el.classList.remove('passed');
            el.textContent = '✗ ' + el.textContent.slice(2);
        }
    });

    if (val.length === 0) {
        strengthFill.style.width = '0%';
        strengthLabel.textContent = 'Enter a password';
        strengthLabel.style.color = 'var(--text-muted)';
        return;
    }

    const level = levels[passed - 1] || levels[0];
    strengthFill.style.width = level.width;
    strengthFill.style.background = level.color;
    strengthLabel.textContent = level.label;
    strengthLabel.style.color = level.color;
});
</script>
@endsection
