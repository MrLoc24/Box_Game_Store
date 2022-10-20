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
                            <h1 class="my-3">{{ str_replace('_', ' ', $game->gameId) }}</h1>

                            <hr>
                            <h4>Available Platform</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                @foreach ($system_req as $sys_req)
                                    <label class="btn btn-default text-center">
                                        <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                                        {{ $sys_req->os }}
                                        <br>
                                    </label>
                                @endforeach
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
                                aria-labelledby="product-desc-tab">
                                <p>{{ $game->description }}</p>
                            </div>
                            <div class="tab-pane fade" id="system-requirements" role="tabpanel"
                                aria-labelledby="product-comments-tab">
                                <div class="container">
                                    <a href="/admin/game/addReq/{{ $game->gameId }}" class="btn btn-primary">Add
                                        Platform</a>
                                    <div class="row">

                                        @foreach ($system_req as $sys_teq => $value)
                                            <div class="col-6">
                                                <div class="card-body">
                                                    <table id="{{ $value->os }}"
                                                        class="table table-bordered table-striped">
                                                        <label for="{{ $value->os }}">{{ $value->os }}</label>
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
                                                            <tr>
                                                                <td>{{ $value->version }}</td>
                                                                <td>{{ $value->chip }}</td>
                                                                <td>{{ $value->ram }}</td>
                                                                <td>{{ $value->graphic }}</td>
                                                                <td>{{ $value->storage }}</td>
                                                                <td>
                                                                    <a href="/admin/game/editReq/{{ $game->gameId }}/{{ $value->os }}"
                                                                        class="btn btn-primary">Edit</a>
                                                                    <a href="/admin/game/deleteReq/{{ $game->gameId }}/{{ $value->os }}"
                                                                        class="btn btn-danger">Delete</a>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        @endforeach
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
