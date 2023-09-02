<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <title>EasyCep - Register</title>
</head>
<body>
    <div class="background"></div>
    <form action="{{ route('register.save') }}" method="POST">
        @csrf
        <h3>Register <span>Easy</span></h3>

        <div class="input-box">
            <input type="text" placeholder="Enter your name" id="name" name="name" class="@error('name')is-invalid @enderror" required value="{{ old('name') }}">
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-box">
            <input type="text" placeholder="Enter your email" id="email" name="email" class="@error('email')is-invalid @enderror" required value="{{ old('email') }}">
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-box">
            <input type="password" placeholder="Create password" id="password" name="password" class="@error('password') is-invalid @enderror" required>
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-box">
            <input type="password" placeholder="Confirm password" id="repeatPassword" name="password_confirmation" class="@error('password_confirmation') is-invalid @enderror" required>
            @error('password_confirmation')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Register Account</button>

        <div class="text">
            <p>Already have an account? <a href="{{ route('login') }}">Login now</a></p>
        </div>
    </form>
</body>
</html>
