@extends('user.profile.layouts')
@section('title', 'Personal Details')
@section('content1')

<style>
    .profile .options .accountsettings{
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
            
            <div class="displayname change">
                <label for="displayname">{{ __('display name') }}</label>
                <input id="name-info" type="text" name="displayname" class="@error('displayname') is-invalid @enderror" value="{{ Auth::user()->userID }}" autocomplete="displayname" disabled>           
            </div>

            <div class="changename change1 fa-solid fa-user-pen" id="login-btn" onclick="loginForm()"></div>

            <div class="email change">
                <label for="email">{{ __('email address') }}</label>
                <input id="email-info" type="text" name="email" class="@error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" autocomplete="email" disabled>
            </div>

            <div class="changeemail change1 fa-solid fa-user-pen" role="button"></div>

        </div>
    </div>

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
                    <div class="details-input">
                        <label for="ava">{{ __('avatar') }}</label>
                        <input id="ava-details" type="text" name="ava" class="@error('ava') is-invalid @enderror" value="{{ __('ava.') }}" autocomplete="ava">           
                    </div>
                    <div class="changeava fa-solid fa-user-pen" role="button"></div>
                </div>
                
                <input class="save" type="submit" value="save changes" name="">
            </div>
        </div>
    </form>

    <div class="delete">
        <p class="title-delete title">{{ __('delete account') }}</p>
        <div class="content-delete">
            <p class="content-delete1">{{ __('Delete your Epic Games account including all personal information, purchases, game progress, in-game content, and Unreal projects. Your account will be permanently deleted in 14 days.') }}</p>
            <input type="submit" value="delete account" name="">
        </div>
    </div>

</div>

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

</div>

<script src="{{ asset('assets_home/js/scriptprofile.js') }}" defer></script>

@endsection