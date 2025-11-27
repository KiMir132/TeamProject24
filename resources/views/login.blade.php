<h1>Login</h1>

<form method="post" action="{{ route('login.login') }}">
    @csrf
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{ old('email') }}">

    <label for="password">Password</label>
    <input type="password" name="password" id="password">

    <button type="submit">Login</button>
</form>