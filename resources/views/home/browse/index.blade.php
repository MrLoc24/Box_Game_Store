@extends('layouts.home')
@section('content')
    <section>

        <!--
                                                                                                            - #GENRES
                                                                                                            -->

        <section class="section genre" data-section>
            <div class="container genre-container swiper">

                <div class="title-wrapper">
                    <h3 class="h3">Popular Genres</h3>
                </div>

                <div class="swiper-button-next swiper-btn"></div>
                <div class="swiper-button-prev swiper-btn"></div>

                <div class="swiper-wrapper">

                    <a href="" class="swiper-slide">
                        <div class="shop-card">

                            <div class="card-banner">
                                <img src="https://store.steampowered.com/categories/homepageimage/category/rpg?cc=us&l=english"
                                    class="img-cover">

                                <div class="gradient" style="background: linear-gradient(rgba(0,0,0,0), rgb(139,0,0) 100%)">
                                </div>

                                <span class="genre-title">ROLE-PLAYING</span>
                            </div>

                        </div>
                    </a>

                    <a href="" class="swiper-slide">
                        <div class="shop-card">

                            <div class="card-banner">
                                <img src="https://store.steampowered.com/categories/homepageimage/category/story_rich?cc=us&l=english"
                                    class="img-cover">

                                <div class="gradient" style="background: linear-gradient(rgba(0,0,0,0), rgb(0,0,139) 100%)">
                                </div>

                                <span class="genre-title">STORY-RICH</span>
                            </div>

                        </div>
                    </a>

                    <a href="" class="swiper-slide">
                        <div class="shop-card">

                            <div class="card-banner">
                                <img src="https://store.steampowered.com/categories/homepageimage/category/horror?cc=us&l=english"
                                    class="img-cover">

                                <div class="gradient"
                                    style="background: linear-gradient(rgba(0,0,0,0), rgb(184,134,11) 100%)"></div>

                                <span class="genre-title">HORROR</span>
                            </div>

                        </div>
                    </a>

                    <a href="" class="swiper-slide">
                        <div class="shop-card">

                            <div class="card-banner">
                                <img src="https://store.steampowered.com/categories/homepageimage/category/visual_novel?cc=us&l=english"
                                    class="img-cover">

                                <div class="gradient" style="background: linear-gradient(rgba(0,0,0,0), rgb(0,100,0) 100%)">
                                </div>

                                <span class="genre-title">VISUAL NOVEL</span>
                            </div>

                        </div>
                    </a>

                    <a href="" class="swiper-slide">
                        <div class="shop-card">

                            <div class="card-banner">
                                <img src="https://store.steampowered.com/categories/homepageimage/category/strategy_cities_settlements?cc=us&l=english"
                                    class="img-cover">

                                <div class="gradient"
                                    style="background: linear-gradient(rgba(0,0,0,0), rgb(0,139,139) 100%)"></div>

                                <span class="genre-title">CITY & SETTLEMENT</span>
                            </div>

                        </div>
                    </a>

                    <a href="" class="swiper-slide">
                        <div class="shop-card">

                            <div class="card-banner">
                                <img src="https://store.steampowered.com/categories/homepageimage/category/survival?cc=us&l=english"
                                    class="img-cover">

                                <div class="gradient"
                                    style="background: linear-gradient(rgba(0,0,0,0), rgb(139,0,139) 100%)"></div>

                                <span class="genre-title">SURVIVAL</span>
                            </div>

                        </div>
                    </a>

                    <a href="" class="swiper-slide">
                        <div class="shop-card">

                            <div class="card-banner">
                                <img src="https://store.steampowered.com/categories/homepageimage/vr?cc=us&l=english"
                                    class="img-cover">

                                <div class="gradient"
                                    style="background: linear-gradient(rgba(0,0,0,0), rgb(233,144,0) 100%)"></div>

                                <span class="genre-title">VIRTUAL REALITY TITLES</span>
                            </div>

                        </div>
                    </a>

                    <a href="" class="swiper-slide">
                        <div class="shop-card">

                            <div class="card-banner">
                                <img src="https://store.steampowered.com/categories/homepageimage/category/science_fiction?cc=us&l=english"
                                    class="img-cover">

                                <div class="gradient" style="background: linear-gradient(rgba(0,0,0,0), rgb(139,0,0) 100%)">
                                </div>

                                <span class="genre-title">SCIFI & CYBERPUNK</span>
                            </div>

                        </div>
                    </a>

                </div>

            </div>
        </section>


        <!--
                                                                                                            - #GAME-LIST
                                                                                                            -->

        <section class="section game-list">

            <div class="container">

                <div class="list-game-container">

                    <div>

                        <div class="game-list-title">
                            <h3 class="h3">Games List</h3>
                            <button class="nav-open-btn" aria-label="open menu" data-filter-toggler
                                onclick="toggleFilter()">
                                <span class="line line-1"></span>
                                <span class="line line-2"></span>
                                <span class="line line-3"></span>
                            </button>
                        </div>

                        <div class="list-game">
                            @foreach ($game as $key => $value)
                                <div class="shop-card">

                                    <a href="/game/{{ $value->gameId }}" class="card-banner">
                                        <img src="{{ $value->icon }}" style="min-height: 290px !important" width="540"
                                            height="720" loading="lazy" alt="{{ $value->gameId }}" class="img-cover">
                                        @if ($value->sale != 0)
                                            <span class="badge" aria-label="20% off">-{{ $value->sale }}%</span>
                                        @endif


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

                    </div>

                    <div class="filter-list">

                        <div class="filter-search">
                            <div class="filter-title">
                                <h3 class="h4">Filters</h3>
                                <button class="reset">RESET</button>
                            </div>

                            <form class="input-wrapper-sidebar">
                                <input type="search" name="search" placeholder="Search a game ..."
                                    class="search-field-sidebar">

                                <button class="search-submit-sidebar" aria-label="search">
                                    <ion-icon name="search-outline" aria-hidden="true"></ion-icon>
                                </button>
                            </form>
                        </div>

                        <div class="filter">
                            <div class="custom-show" data-filter-show onclick="showfilter()">
                                <span class="filter-name">CUSTOM</span>

                                <span class="btn-show">
                                    <ion-icon name="chevron-down-outline" data-arrow class="arrow-custom"></ion-icon>
                                </span>
                            </div>

                            <div class="custom-hide" data-filter-hide>
                                <ul>
                                    <li class="filter-hide-item">
                                        <a href="">All</a>
                                    </li>
                                    <li class="filter-hide-item">
                                        <a href="">New Release</a>
                                    </li>
                                    <li class="filter-hide-item">
                                        <a href="">Cooming Soon</a>
                                    </li>
                                    <li class="filter-hide-item">
                                        <a href="">Alphabetical</a>
                                    </li>
                                    <li class="filter-hide-item">
                                        <a href="">Price: High to Low</a>
                                    </li>
                                    <li class="filter-hide-item">
                                        <a href="">Price: Low to High</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="filter">
                            <div class="genre-show" data-filter-show1 onclick="showfilter1()">
                                <span class="filter-name">GENRE</span>

                                <span class="btn-show">
                                    <ion-icon name="chevron-down-outline" data-arrow1 class="arrow-genre"></ion-icon>
                                </span>
                            </div>

                            <div class="genre-hide" data-filter-hide1>
                                <ul>
                                    @foreach ($type as $genre)
                                        <li class="filter-hide-item">
                                            <a href="">{{ str_replace('_', ' ', $genre->type) }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                        <div class="filter">
                            <div class="platform-show" data-filter-show2 onclick="showfilter2()">
                                <span class="filter-name">FLATFORM</span>

                                <span class="btn-show">
                                    <ion-icon name="chevron-down-outline" data-arrow2 class="arrow-platform"></ion-icon>
                                </span>
                            </div>

                            <div class="platform-hide" data-filter-hide2>
                                <ul>
                                    <li class="filter-hide-item">
                                        <a href="">Mac OS</a>
                                    </li>
                                    <li class="filter-hide-item">
                                        <a href="">Windows</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>



        <!--
                                                                                                            - #FILTER-SIDEBAR
                                                                                                            -->

        <div class="filterbar">

            <div class="filter-list" data-filter-sidebar>

                <div class="filter-search">
                    <div class="filter-title">
                        <h3 class="h4">Filters</h3>
                        <button class="nav-close-btn" aria-label="close menu" data-filter-close onclick="closeFilter()">
                            <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                        </button>
                    </div>

                    <form class="input-wrapper-sidebar">
                        <input type="search" name="search" placeholder="Search a game ..."
                            class="search-field-sidebar">

                        <button class="search-submit-sidebar" aria-label="search">
                            <ion-icon name="search-outline" aria-hidden="true"></ion-icon>
                        </button>
                    </form>
                </div>

                <div class="filter">
                    <div class="custom-show" data-filter-show3 onclick="showfilter3()">
                        <span class="filter-name">CUSTOM</span>

                        <span class="btn-show">
                            <ion-icon name="chevron-down-outline" data-arrow3 class="arrow-custom"></ion-icon>
                        </span>
                    </div>

                    <div class="custom-hide" data-filter-hide3>
                        <ul>
                            <li class="filter-hide-item">
                                <a href="">All</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">New Release</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">Cooming Soon</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">Alphabetical</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">Price: High to Low</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">Price: Low to High</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="filter">
                    <div class="genre-show" data-filter-show4 onclick="showfilter4()">
                        <span class="filter-name">GENRE</span>

                        <span class="btn-show">
                            <ion-icon name="chevron-down-outline" data-arrow4 class="arrow-genre"></ion-icon>
                        </span>
                    </div>

                    <div class="genre-hide" data-filter-hide4>
                        <ul>
                            <li class="filter-hide-item">
                                <a href="">Role-Playing</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">Story-Rich</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">Horror</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">Visual Novel</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">City & Settlement</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">Survival</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">Virtual Reality Titles</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">Scifi & Cyberpunk</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="filter">
                    <div class="platform-show" data-filter-show5 onclick="showfilter5()">
                        <span class="filter-name">FLATFORM</span>

                        <span class="btn-show">
                            <ion-icon name="chevron-down-outline" data-arrow5 class="arrow-platform"></ion-icon>
                        </span>
                    </div>

                    <div class="platform-hide" data-filter-hide5>
                        <ul>
                            <li class="filter-hide-item">
                                <a href="">Mac OS</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">Windows</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="filter-btn">
                    <button class="btn-reset">RESET</button>

                    <button class="btn-done" onclick="closeFilter()">DONE</button>
                </div>

            </div>

            <div class="overlay1" data-filter-sidebar data-overlay1 onclick="closeFilter()"></div>
        </div>
    </section>
@endsection
@section('footer-script')
    <script src="{{ asset('assets_home/js/browse.js') }}"></script>
@endsection
