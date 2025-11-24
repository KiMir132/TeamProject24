<h1>Register<h1>

<form method="post" action="{{ route('register.validate') }}">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}">

    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{ old('email') }}">

    <label for="password">Password</label>
    <input type="text" name="password" id="password">

    <label for="confirm_password">Confirm Password</label>
    <input type="text" name="confirm_password" id="confirm_password">

    <button type="submit">Register</button>
</form>