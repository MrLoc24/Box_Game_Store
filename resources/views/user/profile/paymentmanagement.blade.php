@extends('user.profile.layouts')
@section('title', 'Payment Methods')
@section('content1')

<style>
    .profile .options .payment{
        border-left: var(--blue) solid .5rem;
        color: var(--black);
    }
</style>

<div class="information">

    <div class="payment">
        <p class="title">{{ __('payment management') }}</p>
        <p class="content-payment">{{ __('View your payment activity and the current balance of your BoxGame account. View our Privacy Policy.') }}</p>
    </div>

    <p class="your_payment">{{ __('your payment methods') }}</p>
    
    <div class="add_or_manage">
        @php
            $i = 5;
            $paypal = 0;
            $visa = 0;
            $master = 0;
            $vnpay = 0;
            $momo = 0;       
        @endphp
        
        <p class="content_add_or_manage">{{ __('Add or manage payment methods associated with your Epic Games Account.') }}</p>
        
        <div class="manage">
            <div class="payment-show1" onclick="showpayment1()">
                <span class="payment-name1">manage paymentmethod</span>

                <span class="btn-showmethod1">
                    <ion-icon name="chevron-down-outline" data-arrow1 class="arrow-custom"></ion-icon>
                </span>
            </div>

            <div class="payment-hide1" data-payment-hide1>
                <ul>
                    @forelse ($payments as $payment)
                        @if ($payment->userID == Auth::user()->userID)
                            @php
                                $i++;
                                $function = 'showpaymentdetails' . $i . '()';
                                $data = 'data-paymenthide-hide' . $i;
                            @endphp
                            @if ($payment->card_name == 'paypal' || $payment->card_name == 'vnpay' || $payment->card_name == 'momo')
                                <li class="payment-hide-item1">
                                    <div class="title_payment1" onclick="{{ $function }}">
                                        <input type="radio" name="payment1">
                                        <img src="{{ asset($payment->image) }}" alt="">
                                        <label for="">{{ $payment->card_name }}</label>
                                    </div>
                                            
                                    <div class="content_payment1" {{ $data }}>
                                        <form class="detailspayment1" action="{{ url("paymentdelete/{$payment->cardId}") }}" method="get">
                                            @csrf
                                            <span>You don't want to use {{ $payment->card_name }} ?</span>
                                            <div class="payment_btn1">
                                                <input type="submit" class="submit1" value="{{ __('delete') }}">
                                            </div>                                  
                                        </form>                        
                                    </div>
                                </li>
                            @elseif ($payment->card_name == 'visa')
                                <li class="payment-hide-item1">
                                    <div class="title_payment1" onclick="{{ $function }}">
                                        <input type="radio" name="payment1">
                                        <img src="{{ asset($payment->image) }}" alt="">
                                        <label for="">{{ $payment->card_name }}</label>
                                    </div>
                                            
                                    <div class="content_payment1" {{ $data }}>
                                        <div class="card_details1">card details</div>
                                        <form class="detailspayment1" action="{{ url("payment/{$payment->cardId}") }}" method="post">
                                            @csrf
                                            <div class="payment-form-item1 card_number1">
                                                <label for="card_number">{{ __('Card Number *') }}</label>
                                                <input type="text" class="@error('card_number') is-invalid @enderror" minlength="17" maxlength="19" placeholder="xxxx-xxxx-xxxx-xxxx" name="card_number" id="card_number" value="{{ $payment->card_number }}">        
                                            </div>
                                            <div class="payment-form-item1 card_expi1">
                                                <label for="expiration">{{ __('Expiration *') }}</label>
                                                <input type="text" class="@error('expiration') is-invalid @enderror" maxlength="5" placeholder="xx/xx" name="expiration" id="expiration" value="{{ $payment->payment_date }}">
                                            </div>
                                            <div class="payment-form-item1 card_cvv1">
                                                <label for="cvv">{{ __('CVV *') }}</label>
                                                <input type="text" class="@error('cvv') is-invalid @enderror" minlength="3" maxlength="3" placeholder="xxx" name="cvv" id="cvv" value="{{ $payment->cvv }}">
                                            </div>
                                            <div class="payment_btn">
                                                <a href="{{ url("paymentdelete/{$payment->cardId}") }}">delete</a>
                                                <input type="submit" class="submit1" value="{{ __('update') }}">
                                            </div>                                  
                                        </form>                        
                                    </div>
                                </li>
                            @else
                                <li class="payment-hide-item1">
                                    <div class="title_payment1" onclick="{{ $function }}">
                                        <input type="radio" name="payment1">
                                        <img src="{{ asset($payment->image) }}" alt="">
                                        <label for="">{{ $payment->card_name }}</label>
                                    </div>
                                            
                                    <div class="content_payment1" {{ $data }}>
                                        <div class="card_details1">card details</div>
                                        <form class="detailspayment1" action="{{ url("payment/{$payment->cardId}") }}" method="post">
                                            @csrf
                                            <div class="payment-form-item1 card_number1">
                                                <label for="card_number1">{{ __('Card Number *') }}</label>
                                                <input type="text" class="@error('card_number') is-invalid @enderror" minlength="17" maxlength="19" placeholder="xxxx-xxxx-xxxx-xxxx" name="card_number" id="card_number1" value="{{ $payment->card_number }}">        
                                            </div>
                                            <div class="payment-form-item1 card_expi1">
                                                <label for="expiration1">{{ __('Expiration *') }}</label>
                                                <input type="text" class="@error('expiration') is-invalid @enderror" maxlength="5" placeholder="xx/xx" name="expiration" id="expiration1" value="{{ $payment->payment_date }}">
                                            </div>
                                            <div class="payment-form-item1 card_cvv1">
                                                <label for="cvv1">{{ __('CVV *') }}</label>
                                                <input type="text" class="@error('cvv') is-invalid @enderror" minlength="3" maxlength="3" placeholder="xxx" name="cvv" id="cvv1" value="{{ $payment->cvv }}">
                                            </div>
                                            <div class="payment_btn">
                                                <a href="{{ url("paymentdelete/{$payment->cardId}") }}">delete</a>
                                                <input type="submit" class="submit1" value="{{ __('update') }}">
                                            </div>                                  
                                        </form>                        
                                    </div>
                                </li>
                            @endif
                            @if ($payment->card_name == 'paypal')
                                @php
                                    $paypal++;
                                @endphp
                            @endif
                            @if ($payment->card_name == 'visa')
                                @php
                                    $visa++;
                                @endphp
                            @endif
                            @if ($payment->card_name == 'master')
                                @php
                                    $master++;
                                @endphp
                            @endif
                            @if ($payment->card_name == 'vnpay')
                                @php
                                    $vnpay++;
                                @endphp
                            @endif
                            @if ($payment->card_name == 'momo')
                                @php
                                    $momo++;
                                @endphp
                            @endif
                        @endif
                    @empty
                        <span>No payment methods added.</span>
                    @endforelse
                    @if (session()->has('status'))
                        <div class="valid-feedback">
                            {{ session()->get('status') }}
                        </div>
                    @endif
                    @if (session()->has('status2'))
                        <div class="invalid-feedback">
                            {{ session()->get('status2') }}
                        </div>
                    @endif
                    @error('card_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('expiration')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('cvv')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </ul>
            </div>
        </div>

        <div class="add">
            <div class="payment-show" onclick="showpayment()">
                <span class="payment-name">add paymentmethod</span>

                <span class="btn-showmethod">
                    <ion-icon name="chevron-down-outline" data-arrow class="arrow-custom"></ion-icon>
                </span>
            </div>

            <div class="payment-hide" data-payment-hide>
                <ul>
                    @php 
                        $count = 0;  
                    @endphp
                    @foreach ($payments as $payment)      
                        @if ($payment->userID == Auth::user()->userID)
                            @php
                                $count++;
                            @endphp
                        @endif
                    @endforeach
                    @if ($count == 5) 
                        <span>You already have 5 payment methods we support.</span>
                    @else
                        @if ($paypal == 0)
                        <li class="payment-hide-item">
                            <div class="title_payment" onclick="showpaymentdetails1()">
                                <input type="radio" name="payment">
                                <img src="{{ asset('assets_home/images/paypal.png') }}" alt="">
                                <label for="">PayPal</label>
                            </div>
                                    
                            <div class="content_payment" data-paymenthide-hide1>
                                <form class="detailspayment" action="{{ route('addpayment1') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="paymentname" value="paypal" id="">
                                    <input type="hidden" name="paymentimage" value="assets_home/images/paypal.png" id="">
                                    <span>You will be directed to PayPal to authorize your payment method, then you will be returned to Box Game to complete this purchase.</span>
                                    <input type="submit" class="submit" value="{{ __('save') }}">
                                </form>                        
                            </div>
                        </li>
                        @endif

                        @if ($vnpay == 0)
                        <li class="payment-hide-item">
                            <div class="title_payment" onclick="showpaymentdetails4()">
                                <input type="radio" name="payment">
                                <img src="{{ asset('assets_home/images/vnpay.png') }}" alt="">
                                <label for="">VN Pay</label>
                            </div>

                            <div class="content_payment" data-paymenthide-hide4>
                                <div class="card_details">card details</div>
                                <form class="detailspayment" action="{{ route('addpayment1') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="paymentname" value="vnpay" id="">
                                    <input type="hidden" name="paymentimage" value="assets_home/images/vnpay.png" id="">
                                    <span>You will be directed to VNPay to authorize your payment method, then you will be returned to Box Game to complete this purchase.</span>
                                    <input type="submit" class="submit" value="{{ __('save') }}">
                                </form>                        
                            </div>
                        </li>
                        @endif

                        @if ($momo == 0)
                        <li class="payment-hide-item">
                            <div class="title_payment" onclick="showpaymentdetails5()">
                                <input type="radio" name="payment">
                                <img src="{{ asset('assets_home/images/momo.png') }}" alt="">
                                <label for="">Momo</label>
                            </div>

                            <div class="content_payment" data-paymenthide-hide5>
                                <div class="card_details">card details</div>
                                <form class="detailspayment" action="{{ route('addpayment1') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="paymentname" value="momo" id="">
                                    <input type="hidden" name="paymentimage" value="assets_home/images/momo.png" id="">
                                    <span>You will be directed to Momo to authorize your payment method, then you will be returned to Box Game to complete this purchase.</span>
                                    <input type="submit" name="submit" class="submit" value="{{ __('save') }}">
                                </form>                        
                            </div>
                        </li>
                        @endif

                        @if ($visa == 0)
                        <li class="payment-hide-item">
                            <div class="title_payment" onclick="showpaymentdetails2()">
                                <input type="radio" name="payment">
                                <img src="{{ asset('assets_home/images/visa.jpg') }}" alt="">
                                <label for="">Visa</label>
                            </div>

                            <div class="content_payment" data-paymenthide-hide2>
                                <div class="card_details">card details</div>
                                <form class="detailspayment" action="{{ route('addpayment') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="paymentname" value="visa" id="">
                                    <input type="hidden" name="paymentimage" value="assets_home/images/visa.jpg" id="">
                                    <div class="payment-form-item card_number">
                                        <label for="card_number">{{ __('Card Number *') }}</label>
                                        <input type="text" class="@error('card_number') is-invalid @enderror" minlength="17" maxlength="19" placeholder="xxxx-xxxx-xxxx-xxxx" name="card_number" id="card_number">        
                                    </div>
                                    <div class="payment-form-item card_expi">
                                        <label for="expiration">{{ __('Expiration *') }}</label>
                                        <input type="text" class="@error('expiration') is-invalid @enderror" minlength="5" maxlength="5" placeholder="xx/xx" name="expiration" id="expiration">
                                    </div>
                                    <div class="payment-form-item card_cvv">
                                        <label for="cvv">{{ __('CVV *') }}</label>
                                        <input type="text" class="@error('cvv') is-invalid @enderror" minlength="3" maxlength="3" placeholder="xxx" name="cvv" id="cvv">
                                    </div>
                                    <input type="submit" class="submit" value="{{ __('save') }}">
                                </form>                        
                            </div>
                        </li>
                        @endif

                        @if ($master == 0)
                        <li class="payment-hide-item">
                            <div class="title_payment" onclick="showpaymentdetails3()">
                                <input type="radio" name="payment">
                                <img src="{{ asset('assets_home/images/master.png') }}" alt="">
                                <label for="">Master Card</label>
                            </div>

                            <div class="content_payment" data-paymenthide-hide3>
                                <div class="card_details">card details</div>
                                <form class="detailspayment" action="{{ route('addpayment') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="paymentname" value="master" id="">
                                    <input type="hidden" name="paymentimage" value="assets_home/images/master.png" id="">
                                    <div class="payment-form-item card_number">
                                        <label for="card_number1">{{ __('Card Number *') }}</label>
                                        <input type="text" class="@error('card_number') is-invalid @enderror" minlength="17" maxlength="19" placeholder="xxxx-xxxx-xxxx-xxxx" name="card_number" id="card_number1">        
                                    </div>
                                    <div class="payment-form-item card_expi">
                                        <label for="expiration1">{{ __('Expiration *') }}</label>
                                        <input type="text" class="@error('expiration') is-invalid @enderror" minlength="5" maxlength="5" placeholder="xx/xx" name="expiration" id="expiration1">
                                    </div>
                                    <div class="payment-form-item card_cvv">
                                        <label for="cvv1">{{ __('CVV *') }}</label>
                                        <input type="text" class="@error('cvv') is-invalid @enderror" minlength="3" maxlength="3" placeholder="xxx" name="cvv" id="cvv1">
                                    </div>
                                    <input type="submit" class="submit" value="{{ __('save') }}">
                                </form>                        
                            </div>
                        </li>
                        @endif
                    @endif
                </ul>
                @if (session()->has('status1'))
                    <div class="invalid-feedback">
                        {{ session()->get('status1') }}
                    </div>
                @endif
                @error('card_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                @error('expiration')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                @error('cvv')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
<script src="{{ asset('assets_home/js/scriptpayment.js') }}" defer></script>

@endsection