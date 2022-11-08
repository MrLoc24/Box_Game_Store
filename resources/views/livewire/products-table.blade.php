<div class="swiper-wrapper">
    <?php $count = 0; ?>
    @foreach ($game as $key => $value)
        <?php if ($count == 7) {
            break;
        } ?>
        @if ($value->sale > 0)
            <div class="swiper-slide" wire:ignore.self>
                <div class="shop-card">

                    <div class="card-banner">

                        <a href="/game/{{ $value->gameId }}"><img src="{{ asset("$value->icon") }}" class="img-cover" style="height: 282px"></a>

                        <span class="badge" aria-label="20% off">-{{ $value->sale }}%</span>

                        {{-- <form wire:submit.prevent="addToCart('{{ $value->gameId }}')" action="{{ route('addToCart') }}" method="post">     --}}
                        <div class="card-actions">

                            <div class="tooltip">
                                @if (Auth::check())
                                    @if (in_array($value->gameId, $gameIds))
                                        <button class="action-btn" type="button">
                                            <i class="fa-sharp fa-solid fa-check"></i>
                                        </button>
                                        <span class="tooltiptext">Purchased</span>
                                    @else
                                        @if (Cart::content()->where('id', $value->gameId)->count())
                                            <button class="action-btn" type="button" wire:click.prevent="removeCart('{{ $value->gameId }}')">
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


                            {{-- <button class="action-btn">
                                    <ion-icon name="star-outline" aria-hidden="true"></ion-icon>
                                </button> --}}
                            {{-- <input type="hidden" name="gameId" value="{{ $value->gameId }}"> --}}

                            {{-- @csrf --}}
                            </div>
                        </div>
                        {{-- </form> --}}

                    </div>

                    <div class="card-content">

                        <span class="card-type">BASE GAME</span>

                        <h3>
                            <a href="/game/{{ $value->gameId }}"
                                class="card-title">{{ str_replace('_', ' ', str_replace('__', ': ', $value->gameId)) }}</a>
                        </h3>

                        <div class="price">
                            <del class="del">${{ $value->price }}</del>

                            <span
                                class="span">${{ number_format($value->price * (1 - $value->sale / 100), 2, '.', '') }}</span>
                        </div>

                    </div>

                </div>

            </div>
            <?php $count++; ?>
        @endif

    @endforeach
    
</div>
