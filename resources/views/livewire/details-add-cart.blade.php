<div class="deal">
    @if (in_array($gameId, $gameIds))
        <button type="button" class="addtocart">owned</button>            
    @else
        @if (Cart::content()->where('id', $gameId)->count())
        <button type="button" class="buy">buy now</button>
        <a href="{{ route('cart') }}">
            <button type="button" class="addtocart">view in cart</button>
        </a>
        @else
            @if (Auth::check())
                <button type="button" class="buy">buy now</button>
                <button type="button" class="addtocart" wire:click.prevent="addToCart('{{ $gameId }}')">Add To Cart</button>
            @else
                <a href="{{ route('login') }}">
                    <button type="button" class="buy">buy now</button>
                    <button type="button" class="addtocart">Add To Cart</button>
                </a>
            @endif
        @endif    
    @endif        
</div>

