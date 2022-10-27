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
                            <li class="payment-hide-item1">
                                <div class="title_payment1" onclick="showpaymentdetails()">
                                    <input type="radio" name="payment">
                                    <img src="{{ asset('img/paypal.png') }}" alt="">
                                    <label for="">{{ $payment->card_name }}</label>
                                </div>
                                        
                                <div class="content_payment1" data-paymenthide-hide>
                                    <div class="card_details1">card details</div>
                                    <form class="detailspayment1" action="{{ route('paymentmanagement') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="paymentname" value="paypal" id="">
                                        <div class="payment-form-item1 card_number1">
                                            <label for="card_number">{{ __('Card Number *') }}</label>
                                            <input type="text" name="card_number" id="card_number">        
                                        </div>
                                        <div class="payment-form-item1 card_expi1">
                                            <label for="expiration">{{ __('Expiration *') }}</label>
                                            <input type="date" placeholder="mm/yy" name="expiration" id="expiration">
                                        </div>
                                        <div class="payment-form-item1 card_cvv1">
                                            <label for="cvv">{{ __('CVV *') }}</label>
                                            <input type="text" name="cvv" id="cvv">
                                        </div>
                                        <input type="submit" class="submit1" value="{{ __('save') }}">
                                    </form>                        
                                </div>
                            </li>
                        @endif
                        @empty
                            <span>No payment moethods added.</span>
                    @endforelse
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
                    <li class="payment-hide-item">
                        <div class="title_payment" onclick="showpaymentdetails()">
                            <input type="radio" name="payment">
                            <img src="{{ asset('img/paypal.png') }}" alt="">
                            <label for="">PayPal</label>
                        </div>
                                
                        <div class="content_payment" data-paymenthide-hide>
                            <div class="card_details">card details</div>
                            <form class="detailspayment" action="{{ route('paymentmanagement') }}" method="post">
                                @csrf
                                <input type="hidden" name="paymentname" value="paypal" id="">
                                <div class="payment-form-item card_number">
                                    <label for="card_number">{{ __('Card Number *') }}</label>
                                    <input type="text" name="card_number" id="card_number">        
                                </div>
                                <div class="payment-form-item card_expi">
                                    <label for="expiration">{{ __('Expiration *') }}</label>
                                    <input type="date" placeholder="mm/yy" name="expiration" id="expiration">
                                </div>
                                <div class="payment-form-item card_cvv">
                                    <label for="cvv">{{ __('CVV *') }}</label>
                                    <input type="text" name="cvv" id="cvv">
                                </div>
                                <input type="submit" class="submit" value="{{ __('save') }}">
                            </form>                        
                        </div>
                    </li>
                    <li class="payment-hide-item">
                        <div class="title_payment" onclick="showpaymentdetails1()">
                            <input type="radio" name="payment">
                            <img src="{{ asset('img/visa.jpg') }}" alt="">
                            <label for="">Visa</label>
                        </div>

                        <div class="content_payment" data-paymenthide-hide1>
                            <div class="card_details">card details</div>
                            <form class="detailspayment" action="{{ route('paymentmanagement') }}" method="post">
                                @csrf
                                <input type="hidden" name="paymentname" value="visa" id="">
                                <div class="payment-form-item card_number">
                                    <label for="card_number">{{ __('Card Number *') }}</label>
                                    <input type="text" name="card_number" id="card_number">        
                                </div>
                                <div class="payment-form-item card_expi">
                                    <label for="expiration">{{ __('Expiration *') }}</label>
                                    <input type="date" placeholder="mm/yy" name="expiration" id="expiration">
                                </div>
                                <div class="payment-form-item card_cvv">
                                    <label for="cvv">{{ __('CVV *') }}</label>
                                    <input type="text" name="cvv" id="cvv">
                                </div>
                                <input type="submit" class="submit" value="{{ __('save') }}">
                            </form>                        
                        </div>
                    </li>
                    <li class="payment-hide-item">
                        <div class="title_payment" onclick="showpaymentdetails2()">
                            <input type="radio" name="payment">
                            <img src="{{ asset('img/master.png') }}" alt="">
                            <label for="">Master Card</label>
                        </div>

                        <div class="content_payment" data-paymenthide-hide2>
                            <div class="card_details">card details</div>
                            <form class="detailspayment" action="{{ route('paymentmanagement') }}" method="post">
                                @csrf
                                <input type="hidden" name="paymentname" value="mastercard" id="">
                                <div class="payment-form-item card_number">
                                    <label for="card_number">{{ __('Card Number *') }}</label>
                                    <input type="text" name="card_number" id="card_number">        
                                </div>
                                <div class="payment-form-item card_expi">
                                    <label for="expiration">{{ __('Expiration *') }}</label>
                                    <input type="date" placeholder="mm/yy" name="expiration" id="expiration">
                                </div>
                                <div class="payment-form-item card_cvv">
                                    <label for="cvv">{{ __('CVV *') }}</label>
                                    <input type="text" name="cvv" id="cvv">
                                </div>
                                <input type="submit" class="submit" value="{{ __('save') }}">
                            </form>                        
                        </div>
                    </li>
                    <li class="payment-hide-item">
                        <div class="title_payment" onclick="showpaymentdetails3()">
                            <input type="radio" name="payment">
                            <img src="{{ asset('img/vnpay.png') }}" alt="">
                            <label for="">VN Pay</label>
                        </div>

                        <div class="content_payment" data-paymenthide-hide3>
                            <div class="card_details">card details</div>
                            <form class="detailspayment" action="{{ route('paymentmanagement') }}" method="post">
                                @csrf
                                <input type="hidden" name="paymentname" value="vnpay" id="">
                                <div class="payment-form-item card_number">
                                    <label for="card_number">{{ __('Card Number *') }}</label>
                                    <input type="text" name="card_number" id="card_number">        
                                </div>
                                <div class="payment-form-item card_expi">
                                    <label for="expiration">{{ __('Expiration *') }}</label>
                                    <input type="date" placeholder="mm/yy" name="expiration" id="expiration">
                                </div>
                                <div class="payment-form-item card_cvv">
                                    <label for="cvv">{{ __('CVV *') }}</label>
                                    <input type="text" name="cvv" id="cvv">
                                </div>
                                <input type="submit" class="submit" value="{{ __('save') }}">
                            </form>                        
                        </div>
                    </li>
                    <li class="payment-hide-item">
                        <div class="title_payment" onclick="showpaymentdetails4()">
                            <input type="radio" name="payment">
                            <img src="{{ asset('img/momo.png') }}" alt="">
                            <label for="">Momo</label>
                        </div>

                        <div class="content_payment" data-paymenthide-hide4>
                            <div class="card_details">card details</div>
                            <form class="detailspayment" action="{{ route('paymentmanagement') }}" method="post">
                                @csrf
                                <input type="hidden" name="paymentname" value="momo" id="">
                                <div class="payment-form-item card_number">
                                    <label for="card_number">{{ __('Card Number *') }}</label>
                                    <input type="text" name="card_number" id="card_number" class="@error('card_number') is-invalid @enderror" value="{{ old('card_number') }}" autocomplete="card_number">        
                                </div>
                                @error('card_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>               
                                @enderror
                                <div class="payment-form-item card_expi">
                                    <label for="expiration">{{ __('Expiration *') }}</label>
                                    <input type="date" placeholder="mm/yy" name="expiration" id="expiration" class="@error('expiration') is-invalid @enderror" value="{{ old('expiration') }}" autocomplete="expiration">
                                </div>
                                @error('expiration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>               
                                @enderror
                                <div class="payment-form-item card_cvv">
                                    <label for="cvv">{{ __('CVV *') }}</label>
                                    <input type="text" name="cvv" id="cvv" class="@error('cvv') is-invalid @enderror" value="{{ old('cvv') }}" autocomplete="cvv">
                                </div>
                                @error('cvv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>               
                                @enderror
                                <input type="submit" name="submit" class="submit" value="{{ __('save') }}">
                            </form>                        
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>

<script src="{{ asset('assets_home/js/scriptpayment.js') }}" defer></script>

@endsection