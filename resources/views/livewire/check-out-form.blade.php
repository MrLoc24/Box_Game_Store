<div class="payment_container">
    <div class="checkout-method">
        <div class="checkout-title">
            <span class="title">CHECKOUT</span>
            <div class="title-user">
                <ion-icon name="person"></ion-icon>
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
        <div class="cart_payment" data-payment-hide1>
            <span class="title">other payment methods</span>
            <ul>
                @forelse ($payments as $payment)
                    @if ($payment->userID == Auth::user()->userID)
                        @php
                            $i++;
                            $function = 'showcartpayment' . $i . '()';
                            $data = 'data-cart-payment' . $i;
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
                        @else
                            <li class="cart_payment1">
                                <div class="title_cart_payment" onclick="{{ $function }}">
                                    <input type="radio" name="payment">
                                    <img src="{{ asset($payment->image) }}" alt="">
                                    <label for="">{{ $payment->card_name }}</label>
                                </div>
                                        
                                <div class="content_cart_payment" {{ $data }}>
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
                                </div>
                            </li>
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
            </ul>
        </div>
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
                $discount += $v_content->price * $v_content->weight / 100;
                $imageLink = $v_content->options->image;
            @endphp

            <div class="order-item">
                <div class="order-img">
                    <img src="{{ asset("$imageLink") }}" alt="">
                </div>
                <div class="oi-details">
                    <span class="item-name">{{ str_replace('_', ' ', str_replace('__', ': ', $v_content->id)) }}</span>
                    @if ($v_content->weight != 0)
                    <span class="badge">-{{ $v_content->weight }}%</span>
                    @else
                    @endif
                    <div class="item-price">
                        @if ($v_content->weight != 0)
                        <del class="del">${{ $v_content->price }}</del>
                        @else
                        @endif
                        <span class="price">${{ number_format($v_content->price * (1 - $v_content->weight / 100), 2, '.', '') }}</span>
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

        <div class="place-order">
            <a href="{{ URL::to('updateCart/' . $cartId ) }}">
                <button class="btn-po">PLACE ORDER</button>
            </a>
            @php
                \Session::put('cart_Id', $cartId)
            @endphp
        </div>
        
    </div>
</div>
