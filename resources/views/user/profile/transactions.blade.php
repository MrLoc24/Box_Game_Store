@extends('user.profile.layouts')
@section('title', 'Purchase History')
@section('content1')

<style>
    .profile .options .transaction {
        border-left: var(--blue) solid .5rem;
        color: var(--black);
    }
</style>

<div class="information">

    <div class="settings">
        <p class="title-settings title">{{ __('purchase history') }}</p>
        <p class="content-settings">{{ __('View your account payment details and transactions.') }}</p>
    </div>

    @if (empty($trans))
    <div class="purchase-history" style="text-align: center; font-weight: 400">No charges have been made to your account yet</div>
    @else

    <div class="purchase-history">
        <table style="width: 100%; text-align: center">
            <tr class="ph-title">
                <th>DATE</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>STATUS</th>
            </tr>
        @foreach ($trans as $tran)
            <tr class="ph-list">
                <td>{{ $tran->date }}</td>
                <td><a href="/game/{{ $tran->gameId }}">{{ str_replace('_', ' ', str_replace('__', ': ', $tran->gameId)) }}</a></td>
                <td>-${{ round($tran->gamePrice * (1 - $tran->gameSale / 100), 2) }}</td>
                <td>
                    @if ($tran->status != 0) 
                    Purchased
                    @else
                    Processing
                    @endif
                </td>
            </tr>
        @endforeach
        </table>
    </div>

    @endif

</div>

{{-- <div class="changename-form-container" data-changename>

    <form action="{{ route('handleaccountsettingss') }}" method="post">
        @csrf
        <div id="close-changename-btn" class="fas fa-times" onclick="showchangenameForm()"></div>
        <img src=" {{ asset('assets_home/images/boxlogo1.png') }} " alt="">
        <h4>{{ __('Add Your New Display Name') }}</h4>
        <div class="box box1">
            <div class="input">
                <label for="new_displayname">{{ __('New Name *') }}</label>
                <input id="new_displayname" type="text" class="@error('new_displayname') is-invalid @enderror" name="new_displayname" value="{{ old('new_displayname') }}" autocomplete="new_displayname" autofocus>
            </div>
            <div class="rules">
                <i class="fa-regular fa-circle-question">
                    <span class="tooltiptext">{{ __('Your display name must be between 3 and 15 characters, no special characters and no space(s)') }}</span>
                </i>               
            </div>
        </div>

        @error('new_displayname')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="box">
            <div class="input">
                <label for="new_displayname_confirmation">{{ __('Confirm Name *') }}</label>
                <input id="new_displayname_confirmation" type="text" class="@error('new_displayname_confirmation') is-invalid @enderror" name="new_displayname_confirmation" value="{{ old('new_displayname_confirmation') }}" autocomplete="new_displayname_confirmation" autofocus>
            </div>
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
            <div class="input">
                <label for="email">{{ __('New Email *') }}</label>
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
            </div>
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

</div> --}}
<script src="{{ asset('assets_home/js/scriptprofile.js') }}" defer></script>

@endsection