@extends('user.profile.layouts')
@section('title', 'Personal Details')
@section('content1')

    <style>
        .profile .options .accountsettings {
            border-left: var(--blue) solid .5rem;
            color: var(--black);
        }
    </style>

    <div class="information">

        <div class="settings">
            <p class="title-settings title">{{ __('account settings') }}</p>
            <p class="content-settings">{{ __('Manage your account’s details.') }}</p>
        </div>

        <div class="info">
            <p class="title-info title">{{ __('account information') }}</p>
            <div class="content-info">

<<<<<<< Updated upstream
                <div class="displayname change">
                    <label for="displayname">{{ __('display name') }}</label>
                    <input id="name-info" type="text" name="displayname"
                        class="@error('displayname') is-invalid @enderror" value="{{ Auth::user()->userID }}"
                        autocomplete="displayname" disabled>
                </div>
=======
            <div class="changename change1 fa-solid fa-user-pen" id="login-btn" onclick="showchangenameForm()"></div>
>>>>>>> Stashed changes

                <div class="changename change1 fa-solid fa-user-pen" id="login-btn" onclick="loginForm()"></div>

                <div class="email change">
                    <label for="email">{{ __('email address') }}</label>
                    <input id="email-info" type="text" name="email" class="@error('email') is-invalid @enderror"
                        value="{{ Auth::user()->email }}" autocomplete="email" disabled>
                </div>

                <div class="changeemail change1 fa-solid fa-user-pen" role="button"></div>

            </div>
        </div>

<<<<<<< Updated upstream
        <form action="" method="post">
            @csrf
            <div class="personal-details">
                <p class="title-details title">{{ __('personal details') }}</p>
                <p class="content-details1">
                    {{ __('Manage your name and contact info. These personal details are private and will not be displayed to other users. View our Privacy Policy.') }}
                </p>
                <div class="content-details2">
                    <div class="firstname details-input">
                        <label for="firstname">{{ __('full name') }}</label>
                        <input id="firstname-details" type="text" name="firstname"
                            class="@error('firstname') is-invalid @enderror" value="{{ Auth::user()->username }}"
                            autocomplete="firstname">
                    </div>
                    <div class="ava">
                        <div class="details-input">
                            <label for="ava">{{ __('avatar') }}</label>
                            <input id="ava-details" type="text" name="ava" class="@error('ava') is-invalid @enderror"
                                value="{{ __('ava.') }}" autocomplete="ava">
                        </div>
                        <div class="changeava fa-solid fa-user-pen" role="button"></div>
                    </div>

                    <input class="save" type="submit" value="save changes" name="">
=======
    <form action="" method="post">
        <div class="personal-details">
            <p class="title-details title">{{ __('personal details') }}</p>
            <p class="content-details1">{{ __('Manage your name and contact info. These personal details are private and will not be displayed to other users. View our Privacy Policy.') }}</p>
            <div class="content-details2">
                <div class="firstname details-input">
                    <label for="firstname">{{ __('full name') }}</label>
                    <input id="firstname-details" type="text" name="firstname" class="@error('firstname') is-invalid @enderror" value="{{ Auth::user()->username }}" autocomplete="firstname">           
                </div>
                <div class="ava">
                    <label for="ava">{{ __('avatar') }}</label>           
                    <img src="{{ asset(Auth::user()->image) }}" alt="">
                    <input type="file"></input>
>>>>>>> Stashed changes
                </div>
            </div>
        </form>

        <div class="delete">
            <p class="title-delete title">{{ __('delete account') }}</p>
            <div class="content-delete">
                <p class="content-delete1">
                    {{ __('Delete your Epic Games account including all personal information, purchases, game progress, in-game content, and Unreal projects. Your account will be permanently deleted in 14 days.') }}
                </p>
                <input type="submit" value="delete account" name="">
            </div>
        </div>

    </div>

<<<<<<< Updated upstream
    <div class="changename-form-container" data-login>

        <form action="" method="post">
            <div id="close-changename-btn" class="fas fa-times" onclick="closeForm()"></div>
            <h3>{{ __('sign in') }}</h3>
            <span>{{ __('username') }}</span>
            <input type="email" name="" class="box" placeholder="enter your email" id="">
            <span>{{ __('password') }}</span>
            <input type="password" name="" class="box" placeholder="enter your password" id="">
            <div class="checkbox">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me">{{ __('remember me') }}</label>
            </div>
            <input type="submit" value="sign in" class="btnn">
            <p>{{ __('forget password ?') }}<a href="#"> click here</a></p>
            <p>{{ __('don\'t have an account ?') }}<a href="#" id="createone-btn">{{ __('create one') }}</a></p>
        </form>
=======
</div>

<div class="changename-form-container" data-changename>

    <form action="" method="post">       
        @csrf
        <div id="close-changename-btn" class="fas fa-times" onclick="showchangenameForm()"></div>
        <img src=" {{ asset('assets_home/images/boxlogo1.png') }} " alt="">
        <h4>{{ __('Add Your New Display Name') }}</h4>
        <div class="box"> 
            <label for="new_name">{{ __('New Name *') }}</label>
            <input id="new_name" type="text" class="@error('new_name') is-invalid @enderror" name="new_name" value="{{ old('new_name') }}" autocomplete="new_name" autofocus>
        </div>

        @error('new_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>               
        @enderror

        <div class="box">
            <label for="confirm_name">{{ __('Confirm Name *') }}</label>
            <input id="confirm_name" type="text" class="@error('confirm_name') is-invalid @enderror" name="confirm_name" value="{{ old('confirm_name') }}" autocomplete="confirm_name" autofocus>
        </div>

        @error('confirm_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>               
        @enderror
        <div class="checkbox">
            <input type="checkbox" name="receive_news" class="@error('receive_news') is-invalid @enderror" id="receive-news">
            <label for="receive-news">{{ __('I agree to change my displayname.') }}</label>
        </div>
        <input type="submit" name="submit" value="{{ __('confirm') }}" class="register-btn btn">
    </form>
>>>>>>> Stashed changes

    </div>

    <script src="{{ asset('assets_home/js/scriptprofile.js') }}" defer></script>

@endsection
