<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Box Game Account Password | Box Game</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets_home/css/styleauth.css') }}">
</head>
<body>
    
    <div class="form-container">
        <form action="{{ route('password.email') }}" method="post">

            @csrf

            <img src="{{ asset('assets_home/images/boxlogo.png') }}" alt="">

            <h5>{{ __('Forgot you password ?') }}</h4>

            <p style="text-align: left;">
                {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>

            @if(session()->has('status'))
            <div class="valid-feedback">
                {{ session()->get('status') }}
            </div>
            @endif

            <div class="box">
                
                <label for="email">{{ __('Email Address *') }}</label>
                <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email">
                
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            
            </div>

            <input type="submit" name="submit" value="{{ __('send mail') }}" class="btn">

            <p>
                {{ __('Remember your password ? ') }}<a href="login">{{ __('Sign In') }}</a><br>
            </p>

        </form>

    </div>

</body>
</html>