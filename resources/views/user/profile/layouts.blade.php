@extends('layouts.home')
@section('content')


<!-- 
    - #PROFILE
  -->

<div style="width: 100%; background: #f8f8f8">
  <section class="section section1">

    <div class="container container1">

      <div class="profile">

        <div class="options">
          <a href="{{ route('accountsettings') }}" class="accountsettings">
            <ion-icon name="person"></ion-icon>
            <div>{{ __('account settings') }}</div>
          </a>
          <div class="communication" id="login-btn">
            <ion-icon name="notifications"></ion-icon>
            <a href="#">communications</a>
          </div>
          <a href="{{ route('paymentmanagement') }}" class="payment">
            <ion-icon name="wallet"></ion-icon>
            <div>{{ __('payment management') }}</div>
          </a>
          <a href="{{ route('transactions') }}" class="transaction">
            <ion-icon name="timer"></ion-icon>
            <div>transactions</div>
          </a>
          <a href="{{ route('passwordandsecurity') }}" class="password">
            <ion-icon name="key"></ion-icon>
            <div>{{ __('password & security') }}</div>
          </a>
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