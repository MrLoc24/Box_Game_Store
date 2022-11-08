@extends('layouts.home')
@section('content')


<!-- 
    - #PROFILE
  -->

<div style="width: 100%; background: #f8f8f8">
  <section class="section">

    <div class="container">

      <div class="profile">

        <div class="options">
          <div class="accountsettings">
            <ion-icon name="person"></ion-icon>
            <a href="{{ route('accountsettings') }}">{{ __('account settings') }}</a>
          </div>
          <div class="communication" id="login-btn">
            <ion-icon name="notifications"></ion-icon>
            <a href="#">communications</a>
          </div>
          <div class="payment">
            <ion-icon name="wallet"></ion-icon>
            <a href="{{ route('paymentmanagement') }}">{{ __('payment management') }}</a>
          </div>
          <div class="transaction">
            <ion-icon name="timer"></ion-icon>
            <a href="{{ route('transactions') }}">transactions</a>
          </div>
          <div class="password">
            <ion-icon name="key"></ion-icon>
            <a href="{{ route('passwordandsecurity') }}">{{ __('password & security') }}</a>
          </div>
          <div class="redeem">
            <ion-icon name="gift"></ion-icon>
            <a href="#">redeem code</a>
          </div>
        </div>

        <div class="informations">
          @yield('content1')
        </div>

      </div>

    </div>

  </section>
</div>

@endsection