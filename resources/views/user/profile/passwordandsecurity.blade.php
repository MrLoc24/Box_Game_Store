@extends('user.profile.layouts')
@section('title', 'Change Your Password')
@section('content1')

<style>
    .profile .options .password {
        border-left: var(--blue) solid .5rem;
        color: var(--black);
    }
</style>

<div class="information">
    <div class="password">
        <p class="title">{{ __('change your password') }}</p>
        <p class="content-password">{{ __('For your security, we highly recommend that you choose a unique password that you don\'t use for any other online account.') }}</p>
    </div>
    
    <form action="{{ route('updatepassword') }}" method="post" id="evaluationForm">
        @csrf
        <div class="form">
            <div class="action">
                <label class="title" for="">current password</label>
                <div class="box">
                    <label for="current_password">{{ __('Current Password *') }}</label>
                    <input id="current_password" type="password" class="@error('current_password') is-invalid @enderror"
                        name="current_password" autocomplete="current_password" autofocus>
                </div>

                @error('current_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label class="title" for="">new password</label>
                <div class="box">
                    <label for="password">{{ __('New Password *') }}</label>
                    <input id="password" type="password" name="password" class="@error('password') is-invalid @enderror"
                        autocomplete="password">
                </div>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label class="title" for="">retype new password</label>
                <div class="box">
                    <label for="password_confirmation">{{ __('Retype New Password *') }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="@error('password_confirmation') is-invalid @enderror" 
                    autocomplete="password_confirmation">
                </div>

                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>            
                @enderror
            </div>
            <div class="rules">
                <label class="title" for="">your password</label>
                <span>Your password must have 8+ characters and maxinum 15 characters</span>
                <span>Your password must have at least 1 number and 1 letter</span>
                <span>Your password must contain no special characters and no space(s)</span>
                @if (session()->has('status'))
                    <div class="valid-feedback">
                        {{ session()->get('status') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="invalid-feedback">
                        {{ session()->get('error') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="btn_change_pass">
            <div class="discard">
                <button type="button" id="evaluationFormEditCancel">discard changes</button>
            </div>
            <div class="save">
                <input type="submit" name="submit" value="{{  __('save changes') }}" id="evaluationFormEdit">
            </div>
        </div>
    </form>

    <div class="signout_container">
        <div class="infor_signout">
            <p class="title">{{ __('signout everywhere') }}</p>
            <span>Sign out everywhere else your Box Game account is being used, including all other browsers, phones, consoles, or any other devices</span>
        </div>
        <div class="btn_signout" onclick="showsignoutForm()">
            signout other sessions
        </div>
    </div>
    @if (session()->has('status1'))
        <div class="valid-feedback">
            {{ session()->get('status1') }}
        </div>
    @endif
    @if (session()->has('error1'))
        <div class="invalid-feedback">
            {{ session()->get('error1') }}
        </div>
    @endif
</div>

<div class="signout-form-container" data-signout>

    <form action="{{ route('logoutEverywhere') }}" method="post">
        @csrf
        <div id="close-signout-btn" class="fas fa-times" onclick="showsignoutForm()"></div>
        <img src=" {{ asset('assets_home/images/boxlogo1.png') }} " alt="">
        <h4>{{ __('Log Out Other Browser Sessions') }}</h4>
        <span>
            {{ __('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }}
        </span>

        <div class="box">
            <div class="input">
                <label for="password">{{ __('Current Password *') }}</label>
                <input id="password" type="password" name="password" autocomplete="password" autofocus>
            </div>
        </div>

        <input type="submit" name="submit" value="{{ __('signout') }}" class="btn">
    </form>

</div>

<script>
    $(document).ready(function() {

    $('#evaluationFormEdit').click(function() {
        $('#evaluationForm').find(':input[type=password]').each(function(i, elem, p) {
        $(this).data("previous-value", $(this).val());
        });
    });

    function restore() {

        $('#evaluationForm').find(':input[type=password]').each(function(i, elem, p) {
                $(this).val($(this).data("previous-value"));
            });
        }

        $('#evaluationFormEditCancel').click(function() {

            restore();
        });
    });

    let signoutForm = document.querySelector('[data-signout]');

    const showsignoutForm = function () {
        signoutForm.classList.toggle("active");
    }

</script>
@endsection