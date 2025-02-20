<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="otp" placeholder="OTP">
        <button type="submit">Login</button>
    </form>
</body>
</html>
