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
                <div class="displayname change">
                    <label for="displayname">{{ __('display name') }}</label>
                    <input id="name-info" type="text" name="displayname"
                        class="@error('displayname') is-invalid @enderror" value="{{ Auth::user()->userID }}"
                        autocomplete="displayname" disabled>
                </div>

                <div class="changename change1 fa-solid fa-user-pen" onclick="showchangenameForm()"></div>

                <div class="email change">
                    <label for="email">{{ __('email address') }}</label>
                    <input id="email-info" type="text" name="email" class="@error('email') is-invalid @enderror"
                        value="{{ Auth::user()->email }}" autocomplete="email" disabled>
                </div>

                <div class="changeemail change1 fa-solid fa-user-pen" onclick="showchangeemailForm()"></div>

                @if (session()->has('status'))
                    <div class="valid-feedback">
                        {{ session()->get('status') }}
                    </div>
                @endif
            </div>
        </div>
        <form action="{{ route('handleaccountsettings') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="personal-details">
                <p class="title-details title">{{ __('personal details') }}</p>
                <p class="content-details1">{{ __('Manage your name and contact info. These personal details are private and will not be displayed to other users. View our Privacy Policy.') }}</p>
                <div class="content-details2">
                    <div class="details-input">
                        <label for="name">{{ __('full name') }}</label>
                        <input id="name" type="text" name="name" class="@error('name') is-invalid @enderror" value="{{ Auth::user()->username }}">           
                    </div>
                    <div class="ava">
                        <label for="ava">{{ __('avatar') }}</label>           
                        <img id="previewImage" src="{{ asset(Auth::user()->image) }}" alt="">
                        <input type="file" onchange="previewFile(this);" id="ava" name="ava" class="image_preview"></input>
                    </div>
                    @if (session()->has('status1'))
                        <div class="valid-feedback">
                            {{ session()->get('status1') }}
                        </div>
                    @endif
                    <input class="save" type="submit" value="save changes" name="">
                </div>
            </div>
        </form>

        <div class="delete">
            <p class="title-delete title">{{ __('delete account') }}</p>
            <div class="content-delete">
                <p class="content-delete1">
                    {{ __('Delete your Box Game account including all personal information, purchases, game progress, in-game content, and Unreal projects. Your account will be permanently deleted in 14 days.') }}
                </p>
                <div class="delete_account" onclick="showdeleteForm()">
                    delete account
                </div>
            </div>
        </div>

    </div>
</div>

<div class="changename-form-container" data-changename>

    <form action="{{ route('handleaccountsettingss') }}" method="post">       
        @csrf
        <div id="close-changename-btn" class="fas fa-times" onclick="showchangenameForm()"></div>
        <img src=" {{ asset('assets_home/images/boxlogo1.png') }} " alt="">
        <h4>{{ __('Add Your New Display Name') }}</h4>
        <div class="box"> 
            <label for="new_displayname">{{ __('New Name *') }}</label>
            <input id="new_displayname" type="text" class="@error('new_displayname') is-invalid @enderror" name="new_displayname" value="{{ old('new_displayname') }}" autocomplete="new_displayname" autofocus>
        </div>

        @error('new_displayname')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>               
        @enderror

        <div class="box">
            <label for="new_displayname_confirmation">{{ __('Confirm Name *') }}</label>
            <input id="new_displayname_confirmation" type="text" class="@error('new_displayname_confirmation') is-invalid @enderror" name="new_displayname_confirmation" value="{{ old('new_displayname_confirmation') }}" autocomplete="new_displayname_confirmation" autofocus>
        </div>

        @error('new_displayname_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>               
        @enderror

        <div class="checkbox">
            <input type="checkbox" name="agree" class="@error('agree') is-invalid @enderror" id="agree">
            <label for="agree">{{ __('I agree to change my displayname.') }}</label>
        </div>

        @error('agree')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>               
        @enderror

        <input type="submit" name="submit" value="{{ __('confirm') }}" class="register-btn btn">
    </form>

</div>

<div class="changeemail-form-container" data-changeemail>

    <form action="{{ route('handleaccountsettingsss') }}" method="post">       
        @csrf
        <div id="close-changeemail-btn" class="fas fa-times" onclick="showchangeemailForm()"></div>
        <img src=" {{ asset('assets_home/images/boxlogo1.png') }} " alt="">
        <h4>{{ __('Add Your New Email') }}</h4>
        <div class="box"> 
            <label for="email">{{ __('New Email *') }}</label>
            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
        </div>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>               
        @enderror

        <div class="checkbox">
            <input type="checkbox" name="agree" class="@error('agree') is-invalid @enderror" id="agree">
            <label for="agree">{{ __('I agree to change my email.') }}</label>
        </div>

        @error('agree')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>               
        @enderror

        <input type="submit" name="submit" value="{{ __('confirm') }}" class="register-btn btn">
    </form>

</div>


<div class="delete-form-container" data-delete>

    <form action="{{ route('handleaccountsettingsss') }}" method="post">       
        @csrf
        <div id="close-delete-btn" class="fas fa-times" onclick="showdeleteForm()"></div>
        <img src=" {{ asset('assets_home/images/boxlogo1.png') }} " alt="">
        <h4>{{ __('Delete Your Account') }}</h4>
        <span class="span1">
            {{ __('Are you sure you want to delete your Box Game account? If you’re having problems, please contact player support who can help.') }}
        </span>
        <span class="span2">
            {{ __('Deleting your account will remove access to Box Game like Fortnite. Personal information, purchases, game progress, in-game content, and Unreal projects will also be permanently deleted.') }}
        </span>

        <a href="{{ route('deleteuser') }}" class="register-btn btn">
            {{ __('delete') }}
        </a>
        <div class="cancel" onclick="showdeleteForm()">
            {{ __('cancel') }}
        </div>
    </form>

</div>
    <script src="{{ asset('assets_home/js/scriptprofile.js') }}" defer></script>

@endsection
