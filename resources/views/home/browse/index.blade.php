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
                    @foreach ($type as $key => $value)
                        <a href="/browse/{{ $value->type }}" class="swiper-slide">
                            <div class="shop-card">

                                <div class="card-banner">
                                    <img src="{{ asset($value->image) }}" class="img-cover">

                                    <div class="gradient"
                                        style="background: linear-gradient(rgba(0,0,0,0), rgb(0,0,0) 100%)">
                                    </div>

                                    <span class="genre-title">{{ $value->type }}</span>
                                </div>

                            </div>
                        </a>
                    @endforeach



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
                        @livewire('browse-add-cart')

                    </div>

                    <div class="filter-list">

                        <div class="filter-search">
                            <div class="filter-title">
                                <h3 class="h4">Filters</h3>
                                <button class="reset">RESET</button>
                            </div>

                            <form class="input-wrapper-sidebar">
                                <input type="search" name="search" placeholder="Search a game ..."
                                    class="search-field-sidebar" id="search">

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
                                        <a href="/browse">All</a>
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
                                    @foreach ($platform as $value)
                                        <li class="filter-hide-item">
                                            <a href="">{{ strtoupper($value->os) }}</a>
                                        </li>
                                    @endforeach
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

                    <div class="input-wrapper-sidebar">
                        <input type="search" name="search" id="search" placeholder="Search a game ..."
                            class="search-field-sidebar">

                        <button class="search-submit-sidebar" aria-label="search">
                            <ion-icon name="search-outline" aria-hidden="true"></ion-icon>
                        </button>
                    </div>
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
                                <a href="/browse">All</a>
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
                            @foreach ($type as $genre)
                                <li class="filter-hide-item">
                                    <a href="">{{ str_replace('_', ' ', $genre->type) }}</a>
                                </li>
                            @endforeach
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
                            @foreach ($platform as $value)
                                <li class="filter-hide-item">
                                    <a href="">{{ $value->os }}</a>
                                </li>
                            @endforeach
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
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>


        <script>
            $(document).ready(function() {
                $('#search').on('keyup', function(e) {
                    e.preventDefault();
                    var value = $(this).val();
                    $.ajax({
                        type: "get",
                        url: '/search',
                        data: {
                            'search': value
                        },
                        success: function(data) {
                            $('.list-game').html(data);
                            // console.log(data);
                        },
                        error: function(data) {
                            var errors = data.responseJSON;
                            console.log(errors);
                        }
                    });

                });
            });
        </script>

    </section>
@endsection
@section('footer-script')
    <script src="{{ asset('assets_home/js/browse.js') }}"></script>
@endsection
