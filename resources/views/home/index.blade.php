@extends('layouts.home')
@section('title', 'Box Game Store | Download & Play PC Games, Mods, DLC & More - Box Game')
@section('content')
    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    - #HERO
                                                                                                                                                                                                                                                                                                                                                                                                                                                                  -->

    <section class="section hero" id="home" aria-label="hero" data-section>
        <div class="container">

            <ul class="has-scrollbar">
                @foreach ($game as $key => $value)
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




    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    - #SHOP
                                                                                                                                                                                                                                                                                                                                                                                                                                                                  -->

    <section class="section shop" data-section>
        <div class="container shop-container swiper">

            <div class="title-wrapper">
                <h3 class="h3">Games On Sale</h3>
            </div>

            <div class="swiper-button-next swiper-btn"></div>
            <div class="swiper-button-prev swiper-btn"></div>

            <div class="swiper-wrapper">
                @foreach ($game as $key => $value)
                    @if ($value->sale > 0)
                        <div class="swiper-slide">
                            <div class="shop-card">

                                <a href="/game/{{ $value->gameId }}" class="card-banner">
                                    <img src="{{ asset("$value->icon") }}" width="400" height="540" loading="lazy"
                                        alt="Facial cleanser" class="img-cover">

                                    <span class="badge" aria-label="20% off">{{ $value->sale }}%</span>

                                    <div class="card-actions">

                                        <button class="action-btn">
                                            <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                                        </button>

                                        <button class="action-btn">
                                            <ion-icon name="star-outline" aria-hidden="true"></ion-icon>
                                        </button>

                                    </div>
                                </a>

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
                {{-- <div class="swiper-slide">
                    <div class="shop-card">

                        <a href="" class="card-banner">
                            <img src="https://cdn1.epicgames.com/spt-assets/dc57439aac3c481aaa52ccb443a4d01a/download-unrailed-offer-11wt8.jpg?h=854&resize=1&w=640"
                                width="540" height="720" loading="lazy" alt="Facial cleanser" class="img-cover">

                            <span class="badge" aria-label="20% off">-40%</span>

                            <div class="card-actions">

                                <button class="action-btn">
                                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                                </button>

                                <button class="action-btn">
                                    <ion-icon name="star-outline" aria-hidden="true"></ion-icon>
                                </button>

                            </div>
                        </a>

                        <div class="card-content">

                            <span class="card-type">BASE GAME</span>

                            <h3>
                                <a href="#" class="card-title">Facial cleanser</a>
                            </h3>

                            <div class="price">
                                <del class="del">$39.00</del>

                                <span class="span">$29.00</span>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="shop-card">

                        <a href="" class="card-banner">
                            <img src="https://cdn1.epicgames.com/offer/65a9273ec61f4bb6b94461eb1ce8ec23/EGS_PCBuildingSimulator2_SpiralHouseLtd_S2_1200x1600-9d894c93110374afb5ff0f666a05c792?h=854&resize=1&w=640"
                                width="540" height="720" loading="lazy" alt="Bio-shroom Rejuvenating Serum"
                                class="img-cover">

                            <span class="badge" aria-label="20% off">-10%</span>

                            <div class="card-actions">

                                <button class="action-btn">
                                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                                </button>

                                <button class="action-btn">
                                    <ion-icon name="star-outline" aria-hidden="true"></ion-icon>
                                </button>

                            </div>
                        </a>

                        <div class="card-content">

                            <span class="card-type">BASE GAME</span>

                            <h3>
                                <a href="#" class="card-title">Facial cleanser</a>
                            </h3>

                            <div class="price">
                                <del class="del">$39.00</del>

                                <span class="span">$29.00</span>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="shop-card">

                        <a href="" class="card-banner">
                            <img src="https://cdn1.epicgames.com/spt-assets/3c3669f30b2a437e85d9b5a9885ecfa8/download-source-of-madness-offer-1q10q.png?h=854&resize=1&w=640"
                                width="540" height="720" loading="lazy" alt="Coffee Bean Caffeine Eye Cream"
                                class="img-cover">

                            <span class="badge" aria-label="20% off">-30%</span>

                            <div class="card-actions">

                                <button class="action-btn">
                                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                                </button>

                                <button class="action-btn">
                                    <ion-icon name="star-outline" aria-hidden="true"></ion-icon>
                                </button>

                            </div>
                        </a>

                        <div class="card-content">

                            <span class="card-type">BASE GAME</span>

                            <h3>
                                <a href="#" class="card-title">Facial cleanser</a>
                            </h3>

                            <div class="price">
                                <del class="del">$39.00</del>

                                <span class="span">$29.00</span>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="shop-card">

                        <a href="" class="card-banner">
                            <img src="https://cdn1.epicgames.com/salesEvent/salesEvent/EGS_SuchArtGeniusArtistSimulator_Voolgi_S2_1200x1600-d51ac0f4a3d20ef478616438e37bb884?h=854&resize=1&w=640"
                                width="540" height="720" loading="lazy" alt="Facial cleanser" class="img-cover">

                            <span class="badge" aria-label="20% off">-50%</span>

                            <div class="card-actions">

                                <button class="action-btn">
                                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                                </button>

                                <button class="action-btn">
                                    <ion-icon name="star-outline" aria-hidden="true"></ion-icon>
                                </button>

                            </div>
                        </a>

                        <div class="card-content">

                            <span class="card-type">BASE GAME</span>

                            <h3>
                                <a href="#" class="card-title">Facial cleanser</a>
                            </h3>

                            <div class="price">
                                <del class="del">$39.00</del>

                                <span class="span">$29.00</span>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="shop-card">

                        <a href="" class="card-banner">
                            <img src="https://cdn1.epicgames.com/spt-assets/aa4e814e8db94167a3ca35871c75c846/download-jars-offer-13zfp.jpg?h=854&resize=1&w=640"
                                width="540" height="720" loading="lazy" alt="Coffee Bean Caffeine Eye Cream"
                                class="img-cover">

                            <span class="badge" aria-label="20% off">-10%</span>

                            <div class="card-actions">

                                <button class="action-btn">
                                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                                </button>

                                <button class="action-btn">
                                    <ion-icon name="star-outline" aria-hidden="true"></ion-icon>
                                </button>

                            </div>
                        </a>

                        <div class="card-content">

                            <span class="card-type">BASE GAME</span>

                            <h3>
                                <a href="#" class="card-title">Facial cleanser</a>
                            </h3>

                            <div class="price">
                                <del class="del">$39.00</del>

                                <span class="span">$29.00</span>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="shop-card">

                        <a href="" class="card-banner">
                            <img src="https://cdn1.epicgames.com/spt-assets/d92266115f8d4d5680562d993435daa5/download-wildcat-gun-machine-offer-tg9yg.jpg?h=854&resize=1&w=640"
                                width="540" height="720" loading="lazy" alt="Facial cleanser" class="img-cover">

                            <span class="badge" aria-label="20% off">-70%</span>

                            <div class="card-actions">

                                <button class="action-btn">
                                    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                                </button>

                                <button class="action-btn">
                                    <ion-icon name="star-outline" aria-hidden="true"></ion-icon>
                                </button>

                            </div>
                        </a>

                        <div class="card-content">

                            <span class="card-type">BASE GAME</span>

                            <h3>
                                <a href="#" class="card-title">Facial cleanser</a>
                            </h3>

                            <div class="price">
                                <del class="del">$39.00</del>

                                <span class="span">$29.00</span>
                            </div>

                        </div>

                    </div>
                </div> --}}

            </div>


        </div>
    </section>




    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    - #BLOG
                                                                                                                                                                                                                                                                                                                                                                                                                                                                  -->

    {{-- <section class="section blog" data-section>
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
    </section> --}}





    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    - #TOP LIST
                                                                                                                                                                                                                                                                                                                                                                                                                                                                  -->

    <section class="section top-list" data-section>

        <div class="container">

            <div class="product-minimal">

                <div class="product-showcase flex-item">

                    <div class="product-tag">
                        <h3 class="h3 tag">Top Sellers</h3>
                        <button class="tag-btn">VIEW MORE</button>
                    </div>

                    <div class="showcase-wrapper">

                        <div class="showcase-container">

                            <div class="showcase">

                                <a href="#" class="showcase-img-box">
                                    <img src="https://cdn1.epicgames.com/offer/65a9273ec61f4bb6b94461eb1ce8ec23/EGS_PCBuildingSimulator2_SpiralHouseLtd_S2_1200x1600-9d894c93110374afb5ff0f666a05c792?h=480&resize=1&w=360"
                                        alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                                </a>

                                <div class="showcase-content">

                                    <h4 class="showcase-title">PC Building Simulator 2</h4>

                                    <div class="price-box">
                                        <del>$12.00</del>
                                        <p class="price">$45.00</p>
                                    </div>

                                </div>

                            </div>

                            <div class="showcase">

                                <a href="#" class="showcase-img-box">
                                    <img src="https://cdn1.epicgames.com/spt-assets/0e9d858ee8a1412fb5292afffe9d512d/download-retrowave-rider-offer-kle1v.png?h=480&resize=1&w=360"
                                        alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                                </a>

                                <div class="showcase-content">

                                    <h4 class="showcase-title">Retrowave Rider</h4>

                                    <div class="price-box">
                                        <del>$12.00</del>
                                        <p class="price">$45.00</p>
                                    </div>

                                </div>

                            </div>

                            <div class="showcase">

                                <a href="#" class="showcase-img-box">
                                    <img src="https://cdn1.epicgames.com/salesEvent/salesEvent/PlagueTale1_1200x1600-98f9fd41d86634c1f82e4b5cbfc4e83f?h=480&resize=1&w=360"
                                        alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                                </a>

                                <div class="showcase-content">

                                    <h4 class="showcase-title">A Plague Tale: Requiem</h4>

                                    <div class="price-box">
                                        <p class="price">$45.00</p>
                                    </div>

                                </div>

                            </div>

                            <div class="showcase">

                                <a href="#" class="showcase-img-box">
                                    <img src="https://cdn1.epicgames.com/spt-assets/aafde465b31e4bd5a169ff1c8a164a17/evoland-legendary-edition-1j93v.png?h=480&resize=1&w=360"
                                        alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                                </a>

                                <div class="showcase-content">

                                    <h4 class="showcase-title">Evoland Legendary Edition</h4>

                                    <div class="price-box">
                                        <del>$12.00</del>
                                        <p class="price">$45.00</p>
                                    </div>

                                </div>

                            </div>

                            <div class="showcase">

                                <a href="#" class="showcase-img-box">
                                    <img src="https://cdn1.epicgames.com/spt-assets/380b2d8808904e3ebc4381fede541193/download-mars-base-offer-10bq5.png?h=480&resize=1&w=360"
                                        alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                                </a>

                                <div class="showcase-content">

                                    <h4 class="showcase-title">Mars Base</h4>

                                    <div class="price-box">
                                        <del>$12.00</del>
                                        <p class="price">$45.00</p>
                                    </div>

                                </div>

                            </div>

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

                                        <a href="#" class="showcase-img-box">
                                            <img src="{{ asset("$value->icon") }}"
                                                alt="relaxed
                                                short full sleeve t-shirt"
                                                width="70" class="showcase-img">
                                        </a>

                                        <div class="showcase-content">

                                            <h4 class="showcase-title">
                                                {{ str_replace('_', ' ', str_replace('__', ': ', $value->gameId)) }}</h4>
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

                                    {{-- <div class="showcase">

                                        <a href="#" class="showcase-img-box">
                                            <img src="https://cdn1.epicgames.com/spt-assets/2b1f8bb2c5f941898b2a6455c77ea176/download-terror-of-hemasaurus-offer-13uc5.jpg?h=480&resize=1&w=360"
                                                alt="relaxed short full sleeve t-shirt" width="70"
                                                class="showcase-img">
                                        </a>

                                        <div class="showcase-content">

                                            <h4 class="showcase-title">Terror of Hemasaurus</h4>

                                            <div class="price-box">
                                                <p class="price">Free</p>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="showcase">

                                        <a href="#" class="showcase-img-box">
                                            <img src="https://cdn1.epicgames.com/spt-assets/64562ac3f12747e783c6153cfa30d3ad/download-trifox-offer-v26k4.jpg?h=480&resize=1&w=360"
                                                alt="relaxed short full sleeve t-shirt" width="70"
                                                class="showcase-img">
                                        </a>

                                        <div class="showcase-content">

                                            <h4 class="showcase-title">Trifox</h4>

                                            <div class="price-box">
                                                <p class="price">$45.00</p>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="showcase">

                                        <a href="#" class="showcase-img-box">
                                            <img src="https://cdn1.epicgames.com/spt-assets/6dbfe35a26c1465cb72df1f5c0773d86/zelter-1fg78.png?h=480&resize=1&w=360"
                                                alt="relaxed short full sleeve t-shirt" width="70"
                                                class="showcase-img">
                                        </a>

                                        <div class="showcase-content">

                                            <h4 class="showcase-title">Zelter</h4>

                                            <div class="price-box">
                                                <p class="price">$45.00</p>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="showcase">

                                        <a href="#" class="showcase-img-box">
                                            <img src="https://cdn1.epicgames.com/fcefd39bedb14d6282fe2ac41edbd5f8/offer/EGS_TheJackboxPartyPack7_JackboxGamesInc_S6-1200x1600-4f431f2e11a3af78ca262c1164e22e45.jpg?h=480&resize=1&w=360"
                                                alt="relaxed short full sleeve t-shirt" width="70"
                                                class="showcase-img">
                                        </a>

                                        <div class="showcase-content">

                                            <h4 class="showcase-title">The Jackbox Party Pack 7</h4>

                                            <div class="price-box">
                                                <p class="price">Free</p>
                                            </div>

                                        </div>

                                    </div> --}}
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

                            <div class="showcase">

                                <a href="#" class="showcase-img-box">
                                    <img src="https://cdn1.epicgames.com/offer/598bbf91c75b4ac9a676d82719acdbb1/EGS_GhostbustersSpiritsUnleashed_IllFonic_S2_1200x1600-5dd4f41b7c5463a7732d4de3f2c45ced?h=480&resize=1&w=360"
                                        alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                                </a>

                                <div class="showcase-content">

                                    <h4 class="showcase-title">Ghostbusters: Spirits Unleashed</h4>

                                    <h4 class="showcase-category">Available 10/18/22</h4>

                                    <div class="price-box">
                                        <p class="price">$45.00</p>
                                    </div>

                                </div>

                            </div>

                            <div class="showcase">

                                <a href="#" class="showcase-img-box">
                                    <img src="https://cdn1.epicgames.com/undefined/offer/JackboxPartyPack3_Hero_Portrait-1280x1420-8edf26dc88b4b389d88c69e08b1cd5d4.jpg?h=480&resize=1&w=360"
                                        alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                                </a>

                                <div class="showcase-content">

                                    <h4 class="showcase-title">Jackbox Party Pack 3</h4>

                                    <h4 class="showcase-category">Coming Soon</h4>

                                </div>

                            </div>

                            <div class="showcase">

                                <a href="#" class="showcase-img-box">
                                    <img src="https://cdn1.epicgames.com/spt-assets/8d420a45afa64866a861feb3184eb764/download-urbek-city-builder-offer-1000q.png?h=480&resize=1&w=360"
                                        alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                                </a>

                                <div class="showcase-content">

                                    <h4 class="showcase-title">Urbek City Builder</h4>

                                    <h4 class="showcase-category">Available 2023</h4>

                                </div>

                            </div>

                            <div class="showcase">

                                <a href="#" class="showcase-img-box">
                                    <img src="https://cdn1.epicgames.com/min/offer/1200x1600-1200x1600-e92fa6b99bb20c9edee19c361b8853b9.jpg?h=480&resize=1&w=360"
                                        alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                                </a>

                                <div class="showcase-content">

                                    <h4 class="showcase-title">Hades</h4>

                                    <h4 class="showcase-category">Available 10/20/22</h4>

                                    <div class="price-box">
                                        <p class="price">$45.00</p>
                                    </div>

                                </div>

                            </div>

                            <div class="showcase">

                                <a href="#" class="showcase-img-box">
                                    <img src="https://cdn1.epicgames.com/0584d2013f0149a791e7b9bad0eec102/offer/GTAV_EGS_Artwork_1200x1600_Portrait%20Store%20Banner-1200x1600-382243057711adf80322ed2aeea42191.jpg?h=480&resize=1&w=360"
                                        alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                                </a>

                                <div class="showcase-content">

                                    <h4 class="showcase-title">Grand Theft Auto V: Premium Edition</h4>

                                    <div class="price-box">
                                        <p class="price">$45.00</p>
                                    </div>

                                </div>

                            </div>

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
