@extends('layouts.home')
@section('title')
    @if (isset($game))
        Box Game | {{ $gameName }}
    @endif
@endsection
@section('header-specific')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets_home/css/tabs.css') }}">
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
                        @php $star =  $avg_star @endphp
                        @foreach (range(1, 5) as $i)
                            <span class="fa-stack" style="width:1em">
                                <i class="far fa-star fa-stack-1x"></i>
                                @if ($star > 0)
                                    @if ($star > 0.5)
                                        <i class="fas fa-star fa-stack-1x"></i>
                                    @else
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    @endif
                                @endif
                                @php $star--; @endphp
                            </span>
                        @endforeach
                        <span style="margin-left: 1px">{{ $avg_star }}</span>
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
                        {{-- <div class="deal">
                            <button type="button" class="buy">buy now</button>
                            <div><button type="button" class="addtocart">Add To Cart</button></div>
                        </div> --}}
                        <livewire:details-add-cart :gameId="$game->gameId">
                        @else
                            <div class="deal">
                                <button type="button" class="buy">download now</button>
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
                                @php $star =  $avg_star @endphp
                                @foreach (range(1, 5) as $i)
                                    <span class="fa-stack" style="width:1em">
                                        <i class="far fa-star fa-stack-1x"></i>
                                        @if ($star > 0)
                                            @if ($star > 0.5)
                                                <i class="fas fa-star fa-stack-1x"></i>
                                            @else
                                                <i class="fas fa-star-half fa-stack-1x"></i>
                                            @endif
                                        @endif
                                        @php $star--; @endphp
                                    </span>
                                @endforeach
                                {{ $avg_star }}
                            @endif
                        </span>
                    </div>

                    <div class="specifications">
                        <h3>Specifications</h3>
                        <div class="specifications1">
                            <div class="tabs">
                                @foreach ($sys_req as $key => $value)
                                    <input type="radio" name="tabs" id="{{ $value->os }}"
                                        @if ($key == 0) @checked(true) @endif>
                                    <label for="{{ $value->os }}">{{ strtoupper($value->os) }}</label>
                                    <div class="tab">
                                        <h5 class="title">System Requirements for {{ strtoupper($value->os) }}</h5>
                                        <hr>
                                        <br>
                                        <div class="os">
                                            <h5>Version</h5>
                                            <p>{{ $value->version }}</p>
                                        </div>
                                        <div class="processor">
                                            <h5>Processor</h5>
                                            <p>{{ $value->chip }}</p>
                                        </div>
                                        <div class="memory">
                                            <h5>Memory</h5>
                                            <p>{{ $value->ram }}</p>
                                        </div>
                                        <div class="graphics">
                                            <h5>Graphics</h5>
                                            <p>{{ $value->graphic }}</p>
                                        </div>
                                        <div class="other">
                                            <h5>Storage</h5>
                                            <p>{{ $value->storage }}</p>
                                        </div>
                                        <div class="logins">
                                            <h5>Logins</h5>
                                            <p>Requires Box Game account</p>
                                        </div>
                                    </div>
                                @endforeach
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

    <div class="checkout">
        <div class="checkout-container" data-checkout>
            <livewire:details-check-out-form :game="$game">
        </div>



        <div class="overlay-checkout" data-overlay-checkout></div>
    </div>
@endsection
@section('footer-script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    - custom js link
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    -->
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <script src="{{ asset('assets_home/js/scriptdetails.js') }}"></script>

    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    - ionicon link
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    -->
@endsection
