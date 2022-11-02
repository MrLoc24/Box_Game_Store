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
    </div>
    
</div>
