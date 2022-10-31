<li class="cart-count-item">
@if ($cart_count != 0)
    <a href="{{ route('cart') }}" class="navbar-link" style="color: var(--text-white)">Cart</a>
    <div class="change-cart-item">
        <span class="cart-count">
            {{ $cart_count }} 
        </span>
    </div>    
@else
    <a href="{{ route('cart') }}" class="navbar-link">Cart</a>
@endif
</li>    

