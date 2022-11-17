<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password | Box Game</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets_home/css/styleauth.css') }}">
</head>
<body>
    
    <div class="form-container">
        <form action="{{ route('password.update') }}" method="post">

            @csrf

            <img src=" {{ asset('assets_home/images/boxlogo.png') }} " alt="">

            <h5>{{ __('Reset Your Password ?') }}</h4>

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            @if(session()->has('status'))
            <div class="valid-feedback">
                {{ session()->get('status') }}
            </div>
            @endif

            <div class="box">
                
                <label for="email">{{ __('Email Address *') }}</label>
                <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email', $request->email) }}" autocomplete="email">
                
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            
            </div>

            <div class="box">
                
                <label for="password">{{ __('New Password') }}</label>
                <input id="password" type="password" name="password" class="@error('password') is-invalid @enderror" autocomplete="new-password">
                
            </div>

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>            
            @enderror

            <div class="box">

                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password">
            
            </div>

            <input type="submit" name="submit" value="{{ __('reset password') }}" class="btn">

        </form>

    </div>

</body>
</html>