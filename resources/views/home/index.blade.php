@extends('layouts.home')
@section('title', 'Box Game Store | Download & Play PC Games, Mods, DLC & More - Box Game')
@section('content')
    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                - #HERO
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              -->

    <section class="section hero" id="home" aria-label="hero" data-section>
        <div class="container">

            <ul class="has-scrollbar">
                <?php $count = 0; ?>
                @foreach ($game as $key => $value)
                    <?php if ($count == 5) {
                        break;
                    } ?>
                    @if ($value->top_page == 1)
                        <li class="scrollbar-item carousel">
                            <div class="hero-card has-bg-image"
                                style="background-image: url('{{ asset("$value->banner") }}')">

                                <div class="card-content">
                                    {{-- <div class="banner-logo">
                                        <img src="{{ asset("$value->icon") }}" alt="Banner Logo">
                                    </div> --}}
                                    @if ($value->price == 0)
                                        <span class="hero-title">
                                            PLAY NOW
                                        </span>
                                        <p class="hero-text">
                                            Play {{ str_replace('_', ' ', str_replace('__', ': ', $value->gameId)) }}
                                        </p>
                                        <a href="/game/{{ $value->gameId }}" class="btn btn-primary">DOWNLOAD NOW FOR
                                            FREE</a>
                                    @else
                                        <span class="hero-title">
                                            BUY NOW
                                        </span>
                                        <p class="hero-text">
                                            Buy {{ str_replace('_', ' ', str_replace('__', ': ', $value->gameId)) }}
                                        </p>
                                        <p class="price">Starting at {{ $value->price }}</p>
                                        <a href="/game/{{ $value->gameId }}" class="btn btn-primary">BUY NOW</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <?php $count++; ?>
                    @endif
                @endforeach


                {{-- <li class="scrollbar-item carousel">
                    <div class="hero-card has-bg-image"
                        style="background-image: url('https://cdn2.unrealengine.com/egs-a-plague-tale-requiem-carousel-desktop-1248x702-24c927037c03.jpg?h=1080&resize=1&w=1920')">

                        <div class="card-content">

                            <div class="banner-logo">
                                <img src="https://cdn2.unrealengine.com/egs-a-plague-tale-requiem-carousel-logo-350x69-408997aa9613.png"
                                    alt="">
                            </div>

                            <span class="hero-title">
                                OUT NOW
                            </span>

                            <p class="hero-text">
                                Embark on a heartrending journey into a brutal, breathtaking world twisted by supernatural
                                forces in
                                Amicia's and Hugo's next chapter.
                            </p>

                            <p class="price">Starting at ₫650,000</p>

                            <a href="#" class="btn btn-primary">BUY NOW</a>

                        </div>

                    </div>
                </li>

                <li class="scrollbar-item carousel">
                    <div class="hero-card has-bg-image"
                        style="background-image: url('https://cdn2.unrealengine.com/egs-ghostbusters-spirits-unleashed-carousel-desktop-1248x702-287e3c41c9a9.jpg?h=1080&resize=1&w=1920')">

                        <div class="card-content">

                            <div class="banner-logo">
                                <img src="https://cdn2.unrealengine.com/egs-ghostbusters-spirits-unleashed-carousel-logo-v2-400x75-854291862610.png"
                                    alt="">
                            </div>

                            <span class="hero-title">
                                OUT NOW
                            </span>

                            <p class="hero-text">
                                Play with up to four friends or solo. The choice is yours in the asymmetrical Ghostbusters
                                game from
                                IllFonic.
                            </p>

                            <p class="price">Starting at ₫373,000</p>

                            <a href="#" class="btn btn-primary">BUY NOW</a>

                        </div>

                    </div>
                </li> --}}

                <a class="prev" onclick="plusSlides(-1)">
                    <ion-icon name="chevron-back-circle" class="btn-pre"></ion-icon>
                </a>
                <a class="next" onclick="plusSlides(1)">
                    <ion-icon name="chevron-forward-circle" class="btn-next"></ion-icon>
                </a>

            </ul>

        </div>
    </section>


    <section class="section shop">
        <div class="container shop-container swiper">

            <div class="title-wrapper">
                <h3 class="h3">Games On Sale</h3>
            </div>

            <div class="swiper-button-next swiper-btn"></div>
            <div class="swiper-button-prev swiper-btn"></div>

            @livewire('products-table')

        </div>

    </section>






    <!--
                                                            - #BLOG
                                                            -->
    <section class="section blog" data-section>
        <div class="container">

            <ul class="flex-list">

                <li class="flex-item">
                    <div class="blog-card">

                        <figure class="card-banner has-before">
                            <img src="https://cdn2.unrealengine.com/en-egs-ddii-alter-of-hope-breaker-1920x1080-d1f48f5c3216.jpg?h=1080&resize=1&w=1920"
                                width="700" height="450" loading="lazy" alt="Find a Store" class="img-cover">
                        </figure>

                        <h3 class="h3">
                            <a href="#" class="card-title">Darkest Dungeon II - New Update</a>
                        </h3>

                        <p class="info">The Altar of Hope Update introduces
                            a comprehensive new progression system with meaningful choices. Play it now!</p>

                        <span class="price">$100</span>

                    </div>
                </li>

                <li class="flex-item">
                    <div class="blog-card">

                        <figure class="card-banner has-before">
                            <img src="https://cdn2.unrealengine.com/en-egs-rumbleverse-accolade-breaker-1920x1080-6389ac6321e1.jpg?h=1080&resize=1&w=1920"
                                width="700" height="450" loading="lazy" alt="Find a Store" class="img-cover">
                        </figure>

                        <h3 class="h3">
                            <a href="#" class="card-title">Rumbleverse - New Update</a>
                        </h3>

                        <p class="info">The Mid-Season Update is here! Master new moves
                            , wield new weapons, and swag out your Rumbler in new cosmetics!</p>

                        <span class="price">Free</span>

                    </div>
                </li>

                <li class="flex-item">
                    <div class="blog-card">

                        <figure class="card-banner has-before">
                            <img src="https://cdn2.unrealengine.com/egs-ghostbusters-spirits-unleashed-breaker-1920x1080-b53fec0db4ff.jpg?h=1080&resize=1&w=1920"
                                width="700" height="450" loading="lazy" alt="Find a Store" class="img-cover">
                        </figure>

                        <h3 class="h3">
                            <a href="#" class="card-title">Ghostbusters: Spirits Unleashed</a>
                        </h3>

                        <p class="info">Hunting or haunting! Play with up to four friends or solo.
                            The choice is yours in the upcoming asymmetrical Ghostbusters game from IllFonic.</p>

                        <span class="price">$150</span>

                    </div>
                </li>

            </ul>

        </div>
    </section>





    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                - #TOP LIST
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              -->

    <section class="section top-list">

        <div class="container">

            <div class="product-minimal">

                <div class="product-showcase flex-item">

                    <div class="product-tag">
                        <h3 class="h3 tag">Top Sellers</h3>
                        <button class="tag-btn">VIEW MORE</button>
                    </div>

                    <div class="showcase-wrapper">

                        <div class="showcase-container">
                            <?php $count = 0; ?>
                            @foreach ($game as $key => $value)
                                <?php if ($count == 5) {
                                    break;
                                } ?>
                                @if ($mostSold->contains('gameId', $value->gameId))
                                    <div class="showcase">

                                        <a href="/game/{{ $value->gameId }}" class="showcase-img-box">
                                            <img src="{{ asset("$value->icon") }}"
                                                alt="relaxed
                                                short full sleeve t-shirt"
                                                width="70" class="showcase-img">
                                        </a>

                                        <div class="showcase-content">

                                            <h4 class="showcase-title">
                                                <a href="/game/{{ $value->gameId }}">{{ str_replace('_', ' ', str_replace('__', ': ', $value->gameId)) }}
                                                </a>
                                            </h4>
                                            <div class="price-box">
                                                @if ($value->price && $value->sale)
                                                    <p class="price">
                                                        ${{ number_format($value->price * (1 - $value->sale / 100), 2, '.', '') }}
                                                    </p>
                                                @elseif ($value->price)
                                                    <p class="price">${{ $value->price }}</p>
                                                @else
                                                    <p class="price">Free</p>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                    <?php $count++; ?>
                                @endif
                            @endforeach
                        </div>

                    </div>

                </div>
                {{-- Most Played --}}
                <div class="product-showcase flex-item">

                    <div class="product-tag">
                        <h3 class="h3 tag">Most Played</h3>
                        <button class="tag-btn">VIEW MORE</button>
                    </div>
                    <div class="showcase-wrapper">

                        <div class="showcase-container">
                            <?php $count = 0; ?>
                            @foreach ($game as $key => $value)
                                <?php if ($count == 5) {
                                    break;
                                } ?>
                                @if ($value->most_played == 1)
                                    <div class="showcase">

                                        <a href="/game/{{ $value->gameId }}" class="showcase-img-box">
                                            <img src="{{ asset("$value->icon") }}"
                                                alt="relaxed
                                                short full sleeve t-shirt"
                                                width="70" class="showcase-img">
                                        </a>

                                        <div class="showcase-content">

                                            <h4 class="showcase-title">
                                                <a href="/game/{{ $value->gameId }}">{{ str_replace('_', ' ', str_replace('__', ': ', $value->gameId)) }}
                                                </a>
                                            </h4>
                                            <div class="price-box">
                                                @if ($value->price && $value->sale)
                                                    <p class="price">
                                                        ${{ number_format($value->price * (1 - $value->sale / 100), 2, '.', '') }}
                                                    </p>
                                                @elseif ($value->price)
                                                    <p class="price">${{ $value->price }}</p>
                                                @else
                                                    <p class="price">Free</p>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                    <?php $count++; ?>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>

                <div class="product-showcase flex-item">

                    <div class="product-tag">
                        <h3 class="h3 tag">Coming Soon</h3>
                        <button class="tag-btn">VIEW MORE</button>
                    </div>

                    <div class="showcase-wrapper">

                        <div class="showcase-container">
                            <?php $count = 0; ?>
                            @foreach ($game as $key => $value)
                                <?php if ($count == 5) {
                                    break;
                                } ?>
                                @if ($value->release_date > date('Y-m-d'))
                                    <div class="showcase">

                                        <a href="/game/{{ $value->gameId }}" class="showcase-img-box">
                                            <img src="{{ asset("$value->icon") }}"
                                                alt="relaxed
                                                short full sleeve t-shirt"
                                                width="70" class="showcase-img">
                                        </a>

                                        <div class="showcase-content">

                                            <h4 class="showcase-title">
                                                <a href="/game/{{ $value->gameId }}">{{ str_replace('_', ' ', str_replace('__', ': ', $value->gameId)) }}
                                                </a>
                                            </h4>
                                            <div class="price-box">
                                                @if ($value->price && $value->sale)
                                                    <p class="price">
                                                        ${{ number_format($value->price * (1 - $value->sale / 100), 2, '.', '') }}
                                                    </p>
                                                @elseif ($value->price)
                                                    <p class="price">${{ $value->price }}</p>
                                                @else
                                                    <p class="price">Free</p>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                    <?php $count++; ?>
                                @endif
                            @endforeach
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                - #CATALOG
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              -->

    <section class="section banner" data-section>
        <div class="container">

            <ul class="banner-list">

                <li>
                    <div class="banner-card has-before">

                        <div class="has-bg-image"
                            style="background-image: url('https://www.gamelivestory.com/images/article/helpful-list-details-all-the-pc-exclusive-game-pass-games-main.webp')">
                        </div>

                    </div>
                </li>

                <li>
                    <div class="banner-card has-before">

                        <a href="">
                            <h3 class="h3 tag">
                                Explore Our Catalog
                            </h3>
                        </a>

                        <p class="card-text">
                            Browse by genre, features, price, and more to find your next favorite game.
                        </p>

                        <a href="#" class="btn btn-secondary">LEARN MORE</a>

                    </div>
                </li>

            </ul>

        </div>
    </section>




@endsection
