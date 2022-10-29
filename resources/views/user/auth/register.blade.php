<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for a Box Game Account | Box Game</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets_home/css/styleauth.css') }}">
</head>
<body>
    
    <div class="form-container">
        <form action="{{ route('handleregister') }}" method="post">

            @csrf

            <img src=" {{ asset('assets_home/images/boxlogo.png') }} " alt="">

            <h4>{{ __('Sign Up') }}</h4>

            <div class="box"> 

                <label for="name">{{ __('Full Name *') }}</label>
                <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

            </div>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>               
            @enderror

            <div class="box">

                <label for="display_name">{{ __('Display Name *') }}</label>
                <input id="display_name" type="text" class="@error('display_name') is-invalid @enderror" name="display_name" value="{{ old('display_name') }}" autocomplete="display_name" autofocus>

            </div>

            @error('display_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>               
            @enderror

            <div class="box">
                
                <label for="email">{{ __('Email Address *') }}</label>
                <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email">
            
            </div>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="box">
                
                <label for="password">{{ __('Password *') }}</label>
                <input id="password" type="password" name="password" class="@error('password') is-invalid @enderror" autocomplete="new-password">
                
            </div>

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>            
            @enderror

            <div class="box">

                <label for="password-confirm">{{ __('Confirm Password *') }}</label>
                <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password">
            
            </div>

            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>            
            @enderror

            <div class="checkbox">

                <input type="checkbox" name="receive_news" class="@error('receive_news') is-invalid @enderror" id="receive-news">
                <label for="receive-news">{{ __('I would like to receive news, surveys and special offers from Box Game.') }}</label>

            </div>

            @error('receive_news')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>            
            @enderror
            
            <div>
                <div class="checkbox">
                    
                    <input type="checkbox" name="terms_of_service" class="@error('terms_of_service') is-invalid @enderror" id="termsofservice">
                    <label for="termsofservice">{{ __('I have read and agree to the ') }}<a href="#">{{ __('terms of service') }}</a></label>

                </div>

                @error('terms_of_service')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>            
                @enderror
            </div>

            <input type="submit" name="submit" value="{{ __('register now') }}" class="register-btn btn">

            <p><a href="#">{{ __('Privacy Policy') }}</a></p>

            <p>
                {{ __('Have a Box Game Account ? ') }}<a href="{{ route('login') }}">{{ __('Sign In') }}</a><br>
                {{ __('Back to ') }}<a href="#">{{ __('all sign up options') }}</a>
            </p>

        </form>

    </div>

</body>
</html>