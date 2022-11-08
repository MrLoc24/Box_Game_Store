<div class="list-game">
    @foreach ($game as $key => $value)
        <div class="shop-card">

            <div class="card-banner">
                <a href="/game/{{ $value->gameId }}"><img src="{{ $value->icon }}" class="img-cover"
                        style="height: 282px"></a>
                @if ($value->sale != 0)
                    <span class="badge" aria-label="20% off">-{{ $value->sale }}%</span>
                @endif


                <div class="card-actions">

                    <div class="tooltip">
                        @if (Auth::check())
                            @if (in_array($value->gameId, $gameIds))
                                <button class="action-btn" type="button">
                                    <i class="fa-sharp fa-solid fa-check"></i>
                                </button>
                                <span class="tooltiptext">Owned</span>
                            @else
                                @if (Cart::content()->where('id', $value->gameId)->count())
                                    <button class="action-btn" type="button"
                                        wire:click.prevent="removeCart('{{ $value->gameId }}')">
                                        -
                                    </button>
                                    <span class="tooltiptext">Remove</span>
                                @else
                                    <button class="action-btn" type="button"
                                        wire:click.prevent="addToCart('{{ $value->gameId }}')">
                                        +
                                    </button>
                                    <span class="tooltiptext">Add to Cart</span>
                                @endif
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="action-btn-login" type="button">
                                +
                            </a>
                            <span class="tooltiptext">Add to Cart</span>
                        @endif
                    </div>

                </div>
            </div>

            <div class="card-content">

                <span class="card-type">BASE GAME</span>

                <h3>
                    <a href="/game/{{ $value->gameId }}"
                        class="card-title">{{ str_replace('_', ' ', str_replace('__', ': ', $value->gameId)) }}</a>
                </h3>

                <div class="price">
                    @if ($value->price)
                        @if ($value->sale)
                            <del class="del">${{ $value->price }}</del>

                            <span
                                class="span">${{ number_format($value->price * (1 - $value->sale / 100), 2, '.', '') }}</span>
                        @else
                            <span class="span">${{ $value->price }}</span>
                        @endif
                    @else
                        <span class="span">FREE</span>
                    @endif
                </div>

            </div>

        </div>
    @endforeach
</div>
