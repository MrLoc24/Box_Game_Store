<div class="payment_container">
    <div class="checkout-method">
        <div class="checkout-title">
            <span class="title">CHECKOUT</span>
            <div class="title-user">
                <i class="fa-solid fa-user"></i>
                <span>{{ Auth::user()->userID }}</span>
            </div>
        </div>
        @php
            $i = 0;
            $paypal = 0;
            $visa = 0;
            $master = 0;
            $vnpay = 0;
            $momo = 0;       
        @endphp
        <div class="checkout_content">
            <div class="cart_payment">
                <span class="title">your payment methods</span>
                <ul>
                    @forelse ($payments as $payment)
                        @if ($payment->userID == Auth::user()->userID)
                            @php
                                $i++;
                                $function = 'showcartpayment' . $i . '()';
                                $data = 'data-cart-payment' . $i;
                                $checkbox = 'checkbox' . $i;
                            @endphp
                            @if ($payment->card_name == 'paypal')
                                <li class="cart_payment1">
                                    <div class="title_cart_payment" onclick="{{ $function }}">
                                        <input type="radio" name="payment">
                                        <img src="{{ asset($payment->image) }}" alt="">
                                        <label for="">{{ $payment->card_name }}</label>
                                    </div>
                                            
                                    <div class="content_cart_payment" {{ $data }}>
                                        <span>You will be directed to PayPal to authorize your payment method, then you will be returned to Box Game to complete this purchase.</span>
                                        <a href="{{ route('processTransaction') }}" class="btn_payment">pay</a>                                                   
                                    </div>
                                </li>
                            @elseif ($payment->card_name == 'vnpay')
                                <li class="cart_payment1">
                                    <div class="title_cart_payment" onclick="{{ $function }}">
                                        <input type="radio" name="payment">
                                        <img src="{{ asset($payment->image) }}" alt="">
                                        <label for="">{{ $payment->card_name }}</label>
                                    </div>
                                            
                                    <div class="content_cart_payment" {{ $data }}>
                                        <span>You will be directed to VNPay to authorize your payment method, then you will be returned to Box Game to complete this purchase.</span>
                                        <form action="{{ route('vnpayPayment') }}" method="post">
                                            @csrf
                                            <button type="submit" name="redirect" class="btn_payment">pay</button>
                                        </form>                                                   
                                    </div>
                                </li>
                            @elseif ($payment->card_name == 'momo')
                                <li class="cart_payment1">
                                    <div class="title_cart_payment" onclick="{{ $function }}">
                                        <input type="radio" name="payment">
                                        <img src="{{ asset($payment->image) }}" alt="">
                                        <label for="">{{ $payment->card_name }}</label>
                                    </div>
                                            
                                    <div class="content_cart_payment" {{ $data }}>
                                        <span>You will be directed to Momo to authorize your payment method, then you will be returned to Box Game to complete this purchase.</span>
                                        <form action="{{ route('momoPayment') }}" method="post">
                                            @csrf
                                            <button type="submit" name="payUrl" class="btn_payment">pay</button>
                                        </form>                                                   
                                    </div>
                                </li>
                            @else
                                <li class="cart_payment1">
                                    <div class="title_cart_payment" id="btn1">
                                        <input type="radio" oninput="document.getElementById('btn-po').disabled = document.getElementById('{{ $checkbox }}').checked ? false : true" id="{{ $checkbox }}" name="payment" class="cdc">
                                        <img src="{{ asset($payment->image) }}" alt="">
                                        <label for="">{{ $payment->card_name }}</label>
                                    </div>
                                            
                                    <!-- <div class="content_cart_payment" {{ $data }}>
                                        <div class="card_details1">card details</div>
                                        <form class="detailspayment1" action="{{ url("payment/{$payment->cardId}") }}" method="post">
                                            @csrf
                                            <div class="payment-form-item1 card_number1">
                                                <label for="card_number">{{ __('Card Number *') }}</label>
                                                <input type="text" name="card_number" id="card_number" value="{{ $payment->card_number }}">        
                                            </div>
                                            <div class="payment-form-item1 card_expi1">
                                                <label for="expiration">{{ __('Expiration *') }}</label>
                                                <input type="date" name="expiration" id="expiration" value="{{ $payment->payment_date }}">
                                            </div>
                                            <div class="payment-form-item1 card_cvv1">
                                                <label for="cvv">{{ __('CVV *') }}</label>
                                                <input type="text" name="cvv" id="cvv" value="{{ $payment->cvv }}">
                                            </div>
                                            <div class="payment_btn">
                                                <a href="{{ url("paymentdelete/{$payment->cardId}") }}">delete</a>
                                                <input type="submit" class="submit1" value="{{ __('update') }}">
                                            </div>                                  
                                        </form>                        
                                    </div> -->
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
                        <span style="margin-left: 2rem; color: var(--text-silver2);">No payment methods added.</span>
                    @endforelse
                    @if (session()->has('status'))
                        <div class="valid-feedback">
                            {{ session()->get('status') }}
                        </div>
                    @endif
                </ul>
            </div>

            <div class="other_payment">         
                <div class="other_payment_show" onclick="showotherpayment()">
                    <span class="title" onclick="showpayment()">other payment methods</span>
                    <span class="btn_show_other_method">
                        <i class="fa-solid fa-chevron-down arrow-custom" data-arrow></i>
                    </span>
                </div>

                <div class="other_payment_hide" data-payment-hide>
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
                                <li class="other_payment1">
                                    <div class="title_other_payment" onclick="showpaymentdetails1()">
                                        <input type="radio" name="payment">
                                        <img src="{{ asset('assets_home/images/paypal.png') }}" alt="">
                                        <label for="">PayPal</label>
                                    </div>
                                            
                                    <div class="content_other_payment" data-paymenthide-hide1>
                                        <span>You wanna use this method later ?</span>
                                        <div class="saveandpay">
                                            <form class="detailspayment1" action="{{ route('addpayment1') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="paymentname" value="paypal" id="">
                                                <input type="hidden" name="paymentimage" value="assets_home/images/paypal.png" id="">
                                                <input type="submit" class="submit" value="{{ __('save') }}">
                                            </form> 
                                            <div class="detailspayment2">
                                                <a href="{{ route('processTransaction') }}">pay</a>
                                            </div>      
                                        </div>                 
                                    </div>
                                </li>
                                @endif

                                @if ($vnpay == 0)
                                <li class="other_payment1">
                                    <div class="title_other_payment" onclick="showpaymentdetails4()">
                                        <input type="radio" name="payment">
                                        <img src="{{ asset('assets_home/images/vnpay.png') }}" alt="">
                                        <label for="">VN Pay</label>
                                    </div>

                                    <div class="content_other_payment" data-paymenthide-hide4>
                                        <span>You wanna use this method later ?</span>
                                        <div class="saveandpay">
                                            <form class="detailspayment1" action="{{ route('addpayment1') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="paymentname" value="vnpay" id="">
                                                <input type="hidden" name="paymentimage" value="assets_home/images/vnpay.png" id="">
                                                <input type="submit" class="submit" value="{{ __('save') }}">
                                            </form>
                                            <form class="detailspayment2" action="{{ route('vnpayPayment') }}" method="post">
                                                @csrf
                                                <button type="submit" name="redirect">pay</button>
                                            </form>
                                        </div>                        
                                    </div>
                                </li>
                                @endif

                                @if ($momo == 0)
                                <li class="other_payment1">
                                    <div class="title_other_payment" onclick="showpaymentdetails5()">
                                        <input type="radio" name="payment">
                                        <img src="{{ asset('assets_home/images/momo.png') }}" alt="">
                                        <label for="">Momo</label>
                                    </div>

                                    <div class="content_other_payment" data-paymenthide-hide5>
                                        <span>You wanna use this method later ?</span>
                                        <div class="saveandpay">
                                            <form class="detailspayment1" action="{{ route('addpayment1') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="paymentname" value="momo" id="">
                                                <input type="hidden" name="paymentimage" value="assets_home/images/momo.png" id="">                                            
                                                <input type="submit" name="submit" class="submit" value="{{ __('save') }}">
                                            </form> 
                                            <form class="detailspayment2" action="{{ route('momoPayment') }}" method="post">
                                                @csrf
                                                <button type="submit" name="payUrl">pay</button>
                                            </form>
                                        </div>                       
                                    </div>
                                </li>
                                @endif

                                @if ($visa == 0)
                                <li class="other_payment1">
                                    <div class="title_other_payment" onclick="showpaymentdetails2()">
                                        <input type="radio" oninput="document.getElementById('btn-po').disabled = document.getElementById('visa').checked ? false : true" name="payment" id="visa" class="cdc">
                                        <img src="{{ asset('assets_home/images/visa.jpg') }}" alt="">
                                        <label for="">Visa</label>
                                    </div>

                                    <div class="content_other_payment" data-paymenthide-hide2>
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
                                                <input type="text" minlength="3" maxlength="3" placeholder="xxx" name="cvv" id="cvv">
                                            </div>
                                            <input type="submit" class="submit" value="{{ __('save') }}">
                                        </form>                        
                                    </div>
                                </li>
                                @endif

                                @if ($master == 0)
                                <li class="other_payment1">
                                    <div class="title_other_payment" onclick="showpaymentdetails3()">
                                        <input type="radio" oninput="document.getElementById('btn-po').disabled = document.getElementById('master').checked ? false : true" name="payment" id="master" class="cdc">
                                        <img src="{{ asset('assets_home/images/master.png') }}" alt="">
                                        <label for="">Master Card</label>
                                    </div>

                                    <div class="content_other_payment" data-paymenthide-hide3>
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
        <a class="redirect" href="{{ route('paymentmanagement') }}">Add or manage your payment methods.</a>
    </div>
    <div class="order-summary">
        <div class="summary-title">
            <span class="title">ORDER SUMMARY</span>
            <button class="close-checkout" onclick="showCheckOut()" wire:click.prevent="removeCartM({{ $cartId }})">
                {{-- <ion-icon name="close-outline"></ion-icon> --}}
                <i class="fa-sharp fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="order-list">
            @php
                $content = Cart::content();
                $totalPrice = 0;
                $discount = 0;
            @endphp

            @foreach ($content as $v_content)

            @php 
                $totalPrice += $v_content->price;
                $discount += $v_content->price * (int)$v_content->options->sale / 100;
                $imageLink = $v_content->options->image;
            @endphp

            <div class="order-item">
                <div class="order-img">
                    <img src="{{ asset("$imageLink") }}" alt="">
                </div>
                <div class="oi-details">
                    <span class="item-name">{{ str_replace('_', ' ', str_replace('__', ': ', $v_content->id)) }}</span>
                    @if ((int)$v_content->options->sale != 0)
                    <span class="badge">-{{ $v_content->options->sale }}%</span>
                    @else
                    @endif
                    <div class="item-price">
                        @if ((int)$v_content->options->sale != 0)
                        <del class="del">${{ $v_content->price }}</del>
                        @else
                        @endif
                        <span class="price">${{ number_format($v_content->price * (1 - (int)$v_content->options->sale / 100), 2, '.', '') }}</span>
                    </div>
                </div>
            </div>

            @endforeach

            <div class="payment-summary">
                <div class="order-price">
                    <span class="title">Price</span>
                    <span class="price">${{ $totalPrice }}</span>
                </div>
                <div class="order-price">
                    <span class="title">Sale Discount</span>
                    <span class="price">-${{ number_format($discount, 2, '.', '') }}</span>
                </div>
                <hr>
                <div class="order-total">
                    <span class="title">Total</span>
                    <span class="price">${{ number_format($totalPrice - $discount, 2, '.', '') }}</span>
                    @php
                        \Session::put('total_after', round($totalPrice - $discount, 2))
                    @endphp
                </div>
                <div class="order-contact">
                    Need Help?
                    <a href="" class="contact">Contact Us</a>
                </div>
            </div>
        </div>

        <div class="place-order tooltip">
            <a href="{{ URL::to('updateCart/' . $cartId ) }}">
                <button class="btn-po" id="btn-po" disabled="disabled">PLACE ORDER</button>
                <span class="tooltiptext">Choose your payment</span>
            </a>
            @php
                \Session::put('cart_Id', $cartId)
            @endphp
        </div>
        
    </div>
</div>
