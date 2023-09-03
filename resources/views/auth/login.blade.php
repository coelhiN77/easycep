<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
    <title>EasyCep - Login</title>
</head>
<body>
    <div class="background"></div>
    <form action="{{ route('login.auth') }}" method="POST">
        @csrf
        <h3>Login <span>Easy</span></h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
            </div>
        @endif
        <div class="input-box">
        <input type="text" placeholder="Enter your email or name" id="login" name="login" value="{{ old('login') }}">
    </div>
        <div class="input-box">
            <input type="password" placeholder="Enter your password" id="password" name="password">
        </div>

        <button type="submit">Login</button>
        <div class="text">
            <p>Don't have an account? <a href="{{ route('register') }}">Register now</a></p>
        </div>
    </form>
</body>
</html>
