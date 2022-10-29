<div class="swiper-wrapper">
    @foreach ($game as $key => $value)
        @if ($value->sale > 0)
            <div class="swiper-slide" wire:ignore.self>
                <div class="shop-card">

                    <div class="card-banner">

                        <a href="/game/{{ $value->gameId }}"><img src="{{ asset("$value->icon") }}" width="400" height="540" loading="lazy"
                            alt="Facial cleanser" class="img-cover"></a>

                        <span class="badge" aria-label="20% off">{{ $value->sale }}%</span>

                        {{-- <form wire:submit.prevent="addToCart('{{ $value->gameId }}')" action="{{ route('addToCart') }}" method="post">     --}}
                            <div class="card-actions" wire:init>

                                @if (Cart::content()->where('id', $value->gameId)->count())
                                {{-- <button class="action-btn" type="button" onclick="showError()">
                                    +
                                </button> --}}
                                @else
                                <button class="action-btn" type="button" wire:click.prevent="addToCart('{{ $value->gameId }}')" onclick="showSuccess()">
                                    {{-- <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon> --}}
                                    +
                                </button>
                                @endif

                                {{-- <button class="action-btn">
                                    <ion-icon name="star-outline" aria-hidden="true"></ion-icon>
                                </button> --}}
                                {{-- <input type="hidden" name="gameId" value="{{ $value->gameId }}"> --}}
                        
                                {{-- @csrf --}}
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

        @endif

    @endforeach

</div>

 