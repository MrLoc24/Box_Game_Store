@extends('layouts.dashboards')
@section('title', 'Game Details')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>E-commerce</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">E-commerce</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none"></h3>
                            <div class="col-12">
                                <img src="{{ asset("$game->icon") }}" class="product-image" alt="Product Image">
                            </div>
                            <div class="col-12 product-image-thumbs">
                                {{-- Get icon --}}
                                <div class="product-image-thumb active">
                                    <img src="{{ asset("$game->icon") }}" alt="icon{{ $game->gameId }}">
                                </div>
                                {{-- Get all image in gameplay folder --}}
                                @foreach (File::glob($game->gameplay . '/*') as $path)
                                    <div class="product-image-thumb active"><img
                                            src="{{ asset(str_replace(public_path(), '', $path)) }}"
                                            alt="{{ str_replace(public_path(), '', $path) }}">
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3">{{ str_replace('_', ' ', $game->gameId) }}</h3>
                            <p>{{ $game->description }}</p>
                            </p>

                            <hr>
                            <h4>Available Platform</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center active">
                                    <input type="radio" name="color_option" id="color_option_a1" autocomplete="off"
                                        checked>
                                    Window
                                    <br>
                                    <i class="fas fa-window fa-2x text-green"></i>
                                </label>
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                                    Mac OS
                                    <br>
                                    <i class="fas fa-c fa-2x text-blue"></i>
                                </label>
                            </div>
                            <hr>
                            <h4>Developer</h4>
                            <a href="{{ $game->developer_web }}">{{ $game->developer }}</a>


                            <div class="bg-gray py-2 px-3 mt-4">
                                <h2 class="mb-0">
                                    ${{ $game->price }}
                                </h2>
                                <h4 class="mt-0">
                                    <small>Sale: {{ $game->sale }}% </small>
                                </h4>
                            </div>

                            <div class="mt-4">
                                <div class="btn btn-primary btn-lg btn-flat">
                                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                    Add to Cart
                                </div>

                                <div class="btn btn-default btn-lg btn-flat">
                                    <i class="fas fa-heart fa-lg mr-2"></i>
                                    Add to Wishlist
                                </div>
                            </div>
                            <div class="mt-4">
                                <h2 class="mb-0">
                                    @foreach ($category as $item => $cate)
                                        <span class="badge badge-primary">{{ $cate->type }}</span>
                                    @endforeach
                                </h2>
                            </div>

                            <div class="mt-4 product-share">
                                <a href="#" class="text-gray">
                                    <i class="fab fa-facebook-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fab fa-twitter-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-envelope-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-rss-square fa-2x"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                    href="#product-desc" role="tab" aria-controls="product-desc"
                                    aria-selected="true">Description</a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                                    href="#system-requirements" role="tab" aria-controls="product-comments"
                                    aria-selected="false">System Requirements</a>
                                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
                                    href="#product-rating" role="tab" aria-controls="product-rating"
                                    aria-selected="false">Rating</a>
                            </div>
                        </nav>
                        <div class="tab-content p-3 w-100" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                                aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et
                                ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit
                                lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor
                                fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius
                                finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent
                                et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci.
                                Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non
                                pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum
                                ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non
                                convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a
                                erat fringilla sollicitudin ultrices vel metus. </div>
                            <div class="tab-pane fade" id="system-requirements" role="tabpanel"
                                aria-labelledby="product-comments-tab">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card-body">
                                                <table id="windowOS" class="table table-bordered table-striped">
                                                    <label for="windowOs">Window</label>
                                                    <thead>
                                                        <tr>
                                                            <th>Version</th>
                                                            <th>ChipSet</th>
                                                            <th>Memory</th>
                                                            <th>VGA</th>
                                                            <th>Storage</th>
                                                            <th>Function</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($system_req_win as $key => $game)
                                                            <tr>

                                                                <td>{{ $game->version }}</td>
                                                                <td>{{ $game->chip }}</td>
                                                                <td>{{ $game->ram }}</td>
                                                                <td>{{ $game->graphic }}</td>
                                                                <td>{{ $game->storage }}</td>

                                                                <td>
                                                                    <a href="/admin/game/delete/{{ $game->gameId }}"
                                                                        class="btn btn-danger">Edit</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card-body">
                                                <table id="macOS" class="table table-bordered table-striped">
                                                    <label for="macOs">Mac</label>
                                                    <thead>
                                                        <tr>
                                                            <th>Version</th>
                                                            <th>ChipSet</th>
                                                            <th>Memory</th>
                                                            <th>VGA</th>
                                                            <th>Storage</th>
                                                            <th>Function</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($system_req_mac as $key => $game)
                                                            <tr>

                                                                <td>{{ $game->version }}</td>
                                                                <td>{{ $game->chip }}</td>
                                                                <td>{{ $game->ram }}</td>
                                                                <td>{{ $game->graphic }}</td>
                                                                <td>{{ $game->storage }}</td>

                                                                <td>
                                                                    <a href="/admin/game/delete/{{ $game->gameId }}"
                                                                        class="btn btn-danger">Edit</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="product-rating" role="tabpanel"
                                aria-labelledby="product-rating-tab">

                                <h3>No rating yet!!! Cyka Blyat!!!!</h3>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
@endsection
@section('footer-script')
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.product-image-thumb').on('click', function() {
                var $image_element = $(this).find('img')
                $('.product-image').prop('src', $image_element.attr('src'))
                $('.product-image-thumb.active').removeClass('active')
                $(this).addClass('active')
            })
        })
    </script>
@endsection
