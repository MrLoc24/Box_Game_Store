<div class="deal">    
    @if (Auth::check())
        @if (in_array($gameId, $gameIds))
            <button type="button" class="addtocart">owned</button>
        @else
            @if (Cart::content()->where('id', $gameId)->count())
                <button type="button" class="buy">buy now</button>
                <a href="{{ route('cart') }}">
                    <button type="button" class="addtocart">view in cart</button>
                </a>
            @else    
                <button type="button" class="buy">buy now</button>
                <button type="button" class="addtocart" wire:click.prevent="addToCart('{{ $gameId }}')">Add To Cart</button>
            @endif
        @endif    
    @else
        <a href="{{ route('login') }}">
            <button type="button" class="buy">buy now</button>
        </a>    
        <a href="{{ route('login') }}">
            <button type="button" class="addtocart">Add To Cart</button>
        </a>
    @endif
</div>

