<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in to Your Box Game Account | Box Game</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets_home/css/styleauth.css') }}">
</head>
<body>
    
    <div class="form-container">
        <form action="{{ route('login') }}" method="post">

            @csrf
            <img src=" {{ asset('assets_home/images/boxlogo.png') }} " alt="">

            <h4>{{ __('Sign In') }}</h4>

            @if(session()->has('status'))
            <div class="valid-feedback">
                {{ session()->get('status') }}
            </div>
            @endif

            @if(session()->has('error'))
            <div class="invalid-feedback">
                {{ session()->get('error') }}
            </div>
            @endif

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
                
                <label for="password">{{ __('Password *') }}</label>
                <input id="password" type="password" name="password" class="@error('password') is-invalid @enderror" autocomplete="current-password">
                
            </div>

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>            
            @enderror

            <div class="check">
                
                <div class="checkbox">
                    <input type="checkbox" name="remember" id="remember" value= "{{ old('remember') ? 'checked' : '' }}">
                    <label for="remember">{{ __('Remember me') }}</label>
                </div>
                
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">{{ __('Forgot Your Password') }}</a>
                @endif
            </div>

            <input type="submit" name="submit" value="{{ __('log in') }}" class="btn">

            <p><a href="#">{{ __('Privacy Policy') }}</a></p>

            <p>
                {{ __('Don\'t have a Box Game Account ? ') }}<a href="register">{{ __('Sign Up') }}</a><br>
                {{ __('Back to ') }}<a href="#">{{ __('all sign up options') }}</a>
            </p>

        </form>

    </div>

</body>
</html>