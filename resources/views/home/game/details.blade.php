@extends('layouts.home')
@section('title')
    @if (isset($game))
        {{ $gameName }}
    @endif
@endsection
@section('content')
    <section class="section" data-section>

        <div class="container bodydetails">

            <div class="gamename">
                <h1>{{ $gameName }}</h1>
            </div>

            <div class="smallinfo">
                {{-- Rating star --}}
                <div class="rating">
                    @if ($avg_star == 0)
                        <p>Not rated yet</p>
                    @else
                        @foreach (range(1, 5) as $i)
                            <span class="fa-stack" style="width:1em">
                                <i class="far fa-star fa-stack-1x"></i>
                                @if ($avg_star > 0)
                                    @if ($avg_star > 0.5)
                                        <i class="fas fa-star fa-stack-1x"></i>
                                    @else
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    @endif
                                @endif
                                {{ $avg_star-- }}
                            </span>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="overview">
                <a href="">Overview</a>
            </div>

            <div class="details">
                <div class="imgs">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="swiper mySwiper2 detailsswiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="{{ asset("$game->banner") }}">
                            </div>
                            @foreach (File::glob($game->gameplay . '/*') as $path)
                                <div class="swiper-slide"><img src="{{ asset(str_replace(public_path(), '', $path)) }}"
                                        alt="{{ str_replace(public_path(), '', $path) }}">
                                </div>
                            @endforeach
                            {{-- <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-01-1920x1080-291add6c1de2.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-02-1920x1080-efb83eb294dd.jpg?h=720&resize=1&w=1280">
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-03-1920x1080-24391139e7ed.jpg?h=720&resize=1&w=1280">
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-04-1920x1080-f694ca838125.jpg?h=720&resize=1&w=1280">
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-05-1920x1080-3afc39cc13fd.jpg?h=720&resize=1&w=1280">
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-06-1920x1080-6601795fd3d2.jpg?h=720&resize=1&w=1280">
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-07-1920x1080-a6ed9966eeed.jpg?h=720&resize=1&w=1280">
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-08-1920x1080-c5fc3bb0c24e.jpg?h=720&resize=1&w=1280">
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-09-1920x1080-0b4a011edb38.jpg?h=720&resize=1&w=1280">
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-10-1920x1080-5085fc260c37.jpg?h=720&resize=1&w=1280">
                            </div> --}}
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper detailsswiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="{{ asset("$game->banner") }}">
                            </div>
                            @foreach (File::glob($game->gameplay . '/*') as $path)
                                <div class="swiper-slide"><img src="{{ asset(str_replace(public_path(), '', $path)) }}"
                                        alt="{{ str_replace(public_path(), '', $path) }}">
                                </div>
                            @endforeach
                            {{-- <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-01-1920x1080-291add6c1de2.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-02-1920x1080-efb83eb294dd.jpg?h=720&resize=1&w=1280">
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-03-1920x1080-24391139e7ed.jpg?h=720&resize=1&w=1280">
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-04-1920x1080-f694ca838125.jpg?h=720&resize=1&w=1280">
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-05-1920x1080-3afc39cc13fd.jpg?h=720&resize=1&w=1280">
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-06-1920x1080-6601795fd3d2.jpg?h=720&resize=1&w=1280">
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-07-1920x1080-a6ed9966eeed.jpg?h=720&resize=1&w=1280">
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-08-1920x1080-c5fc3bb0c24e.jpg?h=720&resize=1&w=1280">
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-09-1920x1080-0b4a011edb38.jpg?h=720&resize=1&w=1280">
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="https://cdn2.unrealengine.com/egs-pcbuildingsimulator2-spiralhouseltd-g1a-10-1920x1080-5085fc260c37.jpg?h=720&resize=1&w=1280">
                                <img src="" alt="">
                            </div> --}}
                        </div>
                        <div class="swiper-button-next bb"></div>
                        <div class="swiper-button-prev bb"></div>

                    </div>
                    <div class="description">

                        <div class="description1">
                            <p style="text-align: left;">
                                {{ $game->description }}
                            </p>
                        </div>

                        <div class="description2">
                            <div class="genres">
                                <p class="genres2">Genres</p>
                                <p class="genres1">
                                    @foreach ($cate as $type)
                                        <a href="#">{{ str_replace('_', ' ', $type->type) }}</a>
                                    @endforeach
                                </p>
                            </div>

                        </div>

                        <div class="description3">
                            @if ($game->price == 0)
                                <span>
                                    Get {{ $gameName }} for free now
                                </span>
                            @elseif($game->price != 0 && $game->sale == 0)
                                <span>
                                    {{ $gameName }} is available now
                                </span>
                            @else
                                <span>
                                    {{ $gameName }} is available now -
                                    Get {{ $game->sale }}% off
                                </span>
                            @endif

                        </div>

                        <div class="description4">
                            <div class="head">
                                <h4>
                                    About {{ str_replace('_', ' ', str_replace('__', ': ', $game->gameId)) }}
                                </h4>
                            </div>
                            <div class="body">
                                <p>{{ $game->about }}</p>
                                <div class="load">
                                    <div class="show" ng-click="loadMore()">
                                        show more
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info" data-info>

                    <div class="name">
                        <img src="{{ asset("$game->icon") }}" alt="">
                    </div>

                    <div class="box">

                        <label>{{ __('base game') }}</label>

                    </div>


                    <div class="price">
                        @if ($game->price == 0)
                            <span class="badge">
                                Get {{ $gameName }} for free now
                            </span>
                        @else
                            @if ($game->sale != 0)
                                <span class="badge">-{{ $game->sale }}%</span>
                                <del class="del">${{ $game->price }}</del>
                                <span
                                    class="span">${{ number_format($game->price * (1 - $game->sale / 100), 2, '.', '') }}</span>
                            @else
                                <span class="span">${{ $game->price }}</span>
                            @endif
                        @endif
                    </div>
                    @if ($game->price != 0)
                        <div class="deal">
                            <input type="submit" name="buynow" value="{{ __('buy now') }}" class="buy">
                            <input type="submit" name="addtocard" value="{{ __('add to cart') }}" class="addtocart">
                        </div>
                    @else
                        <div class="deal">
                            <input type="submit" name="buynow" value="{{ __('download now') }}" class="buy">
                        </div>
                    @endif
                    <div class="refund">
                        <span class="title">Refund Type</span>
                        <span class="informa">
                            Self-Refundable
                            <ion-icon name="help-circle-outline"></ion-icon>
                        </span>
                    </div>
                    <div class="developer">
                        <span class="title">Developer</span>
                        <span class="informa"><a href="{{ $game->developer_web }}">{{ $game->developer }}</a></span>
                    </div>
                    <div class="publisher">
                        <span class="title">Publisher</span>
                        <span class="informa">Box Game Publishing</span>
                    </div>
                    <div class="release">
                        <span class="title">Release Date</span>
                        <span class="informa">{{ date('d-m-Y', strtotime($game->release_date)) }}</span>
                    </div>
                    <div class="platform">
                        <span class="title">Platform</span>
                        <span class="informa">
                            @foreach ($sys_req as $value)
                                @switch(strtolower($value->os))
                                    @case('window')
                                        <ion-icon name="logo-windows"></ion-icon>
                                    @break

                                    @case('mac')
                                        <ion-icon name="logo-apple"></ion-icon>
                                    @break

                                    @case('xbox')
                                        <ion-icon name="logo-xbox"></ion-icon>
                                    @break

                                    @case('linux')
                                        Linux
                                    @break

                                    @case('ps')
                                        PS
                                    @break

                                    @default
                                        <ion-icon name="logo-windows"></ion-icon>
                                    @break
                                @endswitch
                            @endforeach
                        </span>
                    </div>

                    <div class="shareandreport">
                        <div class="share">
                            <ion-icon name="share-social"></ion-icon>
                            <button>share</button>
                        </div>
                        <div class="report">
                            <ion-icon name="flag"></ion-icon>
                            <button>report</button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="bottom">

                <div class="bottom1">

                    <div class="followus">
                        <h3>Follow Us</h3>
                        <span>
                            <a href="">
                                <ion-icon name="game-controller-outline"></ion-icon>
                            </a>
                            <a href="">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                            <a href="">
                                <ion-icon name="globe-outline"></ion-icon>
                            </a>
                            <a href="">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                            <a href="">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>
                            <a href="">
                                <ion-icon name="logo-youtube"></ion-icon>
                            </a>
                        </span>
                    </div>

                    <div class="rating1">
                        <h2>Box Player Ratings</h2>
                        <p>Captured from players in the Box Game ecosystem.</p>
                        <span>
                            {{-- 4.6
                            <ion-icon name="star-sharp"></ion-icon>
                            <ion-icon name="star-sharp"></ion-icon>
                            <ion-icon name="star-sharp"></ion-icon>
                            <ion-icon name="star-sharp"></ion-icon>
                            <ion-icon name="star-half-sharp"></ion-icon> --}}
                            @if ($avg_star == 0)
                                <p>Not rated yet, be the first one to review</p>
                            @else
                                @foreach (range(1, 5) as $i)
                                    <span class="fa-stack" style="width:1em">
                                        <i class="far fa-star fa-stack-1x"></i>
                                        @if ($avg_star > 0)
                                            @if ($avg_star > 0.5)
                                                <i class="fas fa-star fa-stack-1x"></i>
                                            @else
                                                <i class="fas fa-star-half fa-stack-1x"></i>
                                            @endif
                                        @endif
                                        {{ $avg_star-- }}
                                    </span>
                                @endforeach
                                {{ $avg_star }}
                            @endif
                        </span>
                    </div>

                    <div class="specifications">
                        <h3>Specifications</h3>
                        <div class="specifications1">
                            <h5 class="type">Windows</h5>
                            <div class="specifications1a">
                                <div class="left">
                                    <h5 class="title">Minimum</h5>
                                    <div class="os">
                                        <h5>OS</h5>
                                        <p>Windows 10</p>
                                    </div>
                                    <div class="processor">
                                        <h5>Processor</h5>
                                        <p>Intel Core i5-3570 or AMD FX-8350</p>
                                    </div>
                                    <div class="memory">
                                        <h5>Memory</h5>
                                        <p>8 GB</p>
                                    </div>
                                    <div class="graphics">
                                        <h5>Graphics</h5>
                                        <p>NVIDIA GeForce GTX 1050 Ti, 4 GB or AMD Radeon R9 380X, 4 GB</p>
                                    </div>
                                    <div class="other">
                                        <h5>Other</h5>
                                        <p>Details: 1080p @ 30 FPS w/o MSAA</p>
                                    </div>
                                    <div class="logins">
                                        <h5>Logins</h5>
                                        <p>Requires Box Game account</p>
                                    </div>
                                </div>
                                <div class="right">
                                    <h5 class="title">Recommended</h5>
                                    <div class="os">
                                        <h5>OS</h5>
                                        <p>Windows 10</p>
                                    </div>
                                    <div class="processor">
                                        <h5>Processor</h5>
                                        <p>Intel Core i5-10400 or AMD Ryzen 5 3600</p>
                                    </div>
                                    <div class="memory">
                                        <h5>Memory</h5>
                                        <p>12 GB</p>
                                    </div>
                                    <div class="graphics">
                                        <h5>Graphics</h5>
                                        <p>NVIDIA GeForce GTX 1660 Super, 6 GB or AMD Radeon RX 5600 XT, 6 GB</p>
                                    </div>
                                    <div class="other">
                                        <h5>Other</h5>
                                        <p>Details: 1080p @ 60 FPS w/ 2x MSAA</p>
                                    </div>
                                </div>
                            </div>
                            <div class="languagessupported">
                                <h5>Languages Supported</h5>
                                <p>AUDIO: English | TEXT: English, French, German, Japanese, Korean, Polish, Portuguese
                                    - Brazil, Russian, Chinese - Simplified, Spanish - Spain</p>
                            </div>
                            <div class="end">
                                <p>Published by Box Game, Inc. © 2022. “Box Game” and the Box Game logo are
                                    registered trademarks or trademarks of Box Game, Inc. in the United States and
                                    other countries.</p>
                                <a href="">Privacy Policy</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </section>
@endsection
@section('footer-script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    - custom js link
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    -->
    <script src="{{ asset('assets_home/js/scriptdetails.js') }}"></script>

    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    - ionicon link
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
@endsection
{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>| Download and Buy Today - BoxGame Store</title>

    <!--
                    - BoxGame Icon
                  -->
    <link rel="shortcut icon" href="{{ asset('img/boxlogo1.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <!--
                    - custom css link
                  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!--
                    - google font link
                  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

</head>

<body id="top">

    <!--
                    - #HEADER
                  -->

    <header class="header">

        <div class="header-top" data-header>
            <div class="container">

                <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
                    <span class="line line-1"></span>
                    <span class="line line-2"></span>
                    <span class="line line-3"></span>
                </button>



                <div class="header-left">
                    <a href="#" class="logo">
                        <img src="{{ asset('img/boxlogo.png') }}" alt="">
                    </a>
                    <ul class="header-left-list">
                        <li>
                            <a href="#store" class="hll-link">STORE</a>
                        </li>
                        <li>
                            <a href="#faq" class="hll-link">FAQ</a>
                        </li>
                        <li>
                            <a href="#help" class="hll-link">HELP</a>
                        </li>
                        <li>
                            <a href="#contactus" class="hll-link">CONTACT US</a>
                        </li>
                    </ul>
                </div>

                <div class="header-actions">

                    <button class="header-action-btn btn-language">
                        <ion-icon name="earth"></ion-icon>
                        <ul class="languages-list">
                            <li>
                                <a href="" class="laguages-list-link first">Vietnamese</a>
                            </li>
                            <li>
                                <a href="" class="laguages-list-link">Enghlish</a>
                            </li>
                            <li>
                                <a href="" class="laguages-list-link">Español (Spain)</a>
                            </li>
                            <li>
                                <a href="" class="laguages-list-link">Italiano</a>
                            </li>
                            <li>
                                <a href="" class="laguages-list-link">Français (French)</a>
                            </li>
                        </ul>
                    </button>

                    <button class="header-action-btn btn-user-login">
                        <ion-icon name="person"></ion-icon>
                        <span>sign in</span>
                        <ul class="user-list">
                            <li>
                                <a href="" class="user-list-link first">account</a>
                            </li>
                            <li>
                                <a href="" class="user-list-link">wish list</a>
                            </li>
                            <li>
                                <a href="" class="user-list-link">sign out</a>
                            </li>
                        </ul>
                    </button>

                    <button class="header-action-btn btn-user-register">
                        REGISTER
                    </button>

                </div>



                <nav class="navbar">
                    <ul class="navbar-list">
                        <li>
                            <form class="input-wrapper">
                                <input type="search" name="search" placeholder="Search a game ..."
                                    class="search-field">

                                <button class="search-submit" aria-label="search">
                                    <ion-icon name="search-outline" aria-hidden="true"></ion-icon>
                                </button>
                            </form>
                        </li>
                        <li>
                            <a href="#discover" class="navbar-link">Discover</a>
                        </li>

                        <li>
                            <a href="#collection" class="navbar-link">Browse</a>
                        </li>

                        <li>
                            <a href="#shop" class="navbar-link">News</a>
                        </li>
                    </ul>

                    <ul class="navbar-list">
                        <li>
                            <a href="" class="navbar-link">Wishlist</a>
                        </li>
                        <li>
                            <a href="" class="navbar-link">Cart</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>

    </header>





    <!--
                    - #MOBILE NAVBAR
                  -->

    <div class="sidebar">
        <div class="mobile-navbar" data-navbar>

            <div class="wrapper">
                <a href="#" class="logo">
                    BOX<span>GAME</span>
                </a>

                <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
                    <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                </button>
            </div>

            <ul class="navbar-list">

                <li>
                    <div class="btn-store" onclick="showstorelist()">
                        <span class="store-title">Store</span>

                        <ion-icon name="chevron-down-outline" data-arrow6 class="arrow-genre"></ion-icon>
                    </div>

                    <ul class="store-list" data-store-hide>
                        <li>
                            <a href="#discover" class="store-list-link" data-nav-link>Discover</a>
                        </li>
                        <li>
                            <a href="#browse" class="store-list-link" data-nav-link>Browse</a>
                        </li>
                        <li>
                            <a href="news" class="store-list-link" data-nav-link>News</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#faq" class="navbar-link" data-nav-link>FAQ</a>
                </li>

                <li>
                    <a href="#help" class="navbar-link" data-nav-link>Help</a>
                </li>

                <li>
                    <a href="#contactus" class="navbar-link" data-nav-link>Contact Us</a>
                </li>

                <li class="search-form">
                    <form class="input-wrapper-sidebar">
                        <input type="search" name="search" placeholder="Search a game ..."
                            class="search-field-sidebar">

                        <button class="search-submit-sidebar" aria-label="search">
                            <ion-icon name="search-outline" aria-hidden="true"></ion-icon>
                        </button>
                    </form>
                </li>

            </ul>

        </div>

        <div class="overlay" data-nav-toggler data-overlay></div>
    </div>




    <!--
                    - #DETAILS
                  -->






    <!--
                    - #FOOTER
                  -->

    <footer class="section footer">
        <div class="container">

            <div class="footer-top">

                <ul class="footer-list">

                    <li>
                        <p class="footer-list-title">Contact Us</p>
                    </li>

                    <li>
                        <a href="" class="footer-link">+0123 - 456 - 789</a>
                    </li>

                    <li>
                        <a href="" class="footer-link">Group4-2112E0@gmail.com</a>
                    </li>

                </ul>

                <ul class="footer-list">

                    <li>
                        <p class="footer-list-title">Useful links</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Browse</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">News</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Top Sellers</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Free Game</a>
                    </li>

                </ul>

                <ul class="footer-list">

                    <li>
                        <p class="footer-list-title">Infomation</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Need a Help</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">FAQ</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Terms of Service</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Privacy Policy</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Store Refund Policy </a>
                    </li>

                </ul>

                <div class="footer-list">

                    <p class="newsletter-title">Send emails.</p>

                    <p class="newsletter-text">
                        Enter your email below to be the first to know about new collections and games.
                    </p>

                    <form action="" class="newsletter-form">
                        <input type="email" name="email_address" placeholder="Enter your email address" required
                            class="email-field">

                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </form>

                </div>

            </div>

            <div class="footer-bottom">

                <div class="wrapper">
                    <p class="copyright">
                        &copy; 2022 BoxGame
                    </p>

                    <ul class="social-list">

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-youtube"></ion-icon>
                            </a>
                        </li>

                    </ul>
                </div>

                <a href="#" class="logo">
                    <img src="{{ asset('img/boxlogo.png') }}" alt="">
                </a>

                <img src="{{ asset('img/pay.png') }}" width="313" height="28"
                    alt="available all payment method" class="w-100">

            </div>

        </div>
    </footer>



</body>

</html> --}}
