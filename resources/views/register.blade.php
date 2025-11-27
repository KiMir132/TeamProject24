<h1>Register</h1>

<form method="post" action="{{ route('register.validate') }}">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}">

    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{ old('email') }}">

    <label for="password">Password</label>
    <input type="password" name="password" id="password">

    <label for="password_confirmation">Confirm Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation">

    <button type="submit">Register</button>
</form>