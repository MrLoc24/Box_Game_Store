@extends('layouts.dashboards')
@section('title', 'Game Details')
@section('header-specific')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    <section>


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Game Details</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                                <li class="breadcrumb-item active">Game Details</li>
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
                                <h1 class="my-3">{{ str_replace('_', ' ', str_replace('__', ': ', $game->gameId)) }}</h1>

                                <hr>
                                <h4>Description</h4>
                                <p>{{ $game->description }}</p>
                                <hr>
                                <h4>Available Platform</h4>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    @foreach ($system_req as $sys_req)
                                        <label class="btn btn-default text-center">
                                            <input type="radio" name="color_option" id="color_option_a2"
                                                autocomplete="off">
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
                                        @if ($game->price > 0)
                                            {{ $game->price }}$
                                        @else
                                            Free To Play
                                        @endif
                                    </h2>
                                    <h4 class="mt-0">
                                        <small>Sale: {{ $game->sale }}% </small>
                                    </h4>
                                </div>

                                <div class="mt-4">
                                    {{-- <a href="/admin/game/editDetail/{{ $game->gameId }}" class="btn btn-primary">Edit Details</a> --}}
                                    <!-- <div class="btn btn-primary btn-lg btn-flat">
                                                                                                                                                                                                                                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                                                                                                                                                                                                                        Edit Details
                                                                                                                                                                                                                                    </div> -->

                                    <button type="button" class="btn btn-primary btn-lg btn-flat" data-toggle="modal"
                                        data-target="#detailModal">
                                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                        Edit Details
                                    </button>
                                    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-
                                        labelledby="demoModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <form action="/admin/game/editDetail/{{ $game->gameId }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="demoModalLabel{{ $game->gameId }}">
                                                            Edit Detail Game For
                                                            {{ str_replace('_', ' ', str_replace('__', ': ', $game->gameId)) }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-
                                                            label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <label for="os" class="col-sm-2 col-form-label">Game
                                                                Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="detailID"
                                                                    placeholder="Type of Os" name="detailID"
                                                                    value="{{ str_replace('_', ' ', str_replace('__', ': ', $game->gameId)) }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="description"
                                                                class="col-sm-2 col-form-label">Description</label>
                                                            <div class="col-sm-10">
                                                                <textarea type="text" class="form-control" id="detailDesc" placeholder="detailDescription" name="detailDesc"
                                                                    value="{{ $game->description }}">{{ $game->description }}
                                                                                    </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="about"
                                                                class="col-sm-2 col-form-label">About</label>
                                                            <div class="col-sm-10">
                                                                <textarea type="text" rows='10' class="form-control" id="detailAbout" placeholder="detailAbout"
                                                                    name="detailAbout">{{ $game->about }}
                                                                                    </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="date" class="col-sm-2 col-form-label">Release
                                                                Date</label>
                                                            <div class="col-sm-10">
                                                                <input type="date" class="form-control"
                                                                    id="detailDate" name="detailDate"
                                                                    value="{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $game->release_date)->format('Y-m-d') }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="price"
                                                                class="col-sm-2 col-form-label">Price</label>
                                                            <div class="col-sm-10">
                                                                <input type="test" class="form-control"
                                                                    id="detailPrice" name="detailPrice"
                                                                    value="{{ $game->price }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="sale"
                                                                class="col-sm-2 col-form-label">Sale</label>
                                                            <div class="col-sm-10">
                                                                <input type="number" class="form-control"
                                                                    id="detailSale" name="detailSale"
                                                                    value="{{ $game->sale }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="developer"
                                                                class="col-sm-2 col-form-label">Developer</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="detailDev"
                                                                    placeholder="Graphic Card" name="detailDev"
                                                                    value="{{ $game->developer }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="developerweb"
                                                                class="col-sm-2 col-form-label">Developer Web</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    id="detaildevWeb" placeholder="Storage"
                                                                    name="detaildevWeb"
                                                                    value="{{ $game->developer_web }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save
                                                            change</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>
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
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#editType">Add/Delete Type</button>
                                    </div>

                                </div>
                            </div>
                            <div class="row mt-4">
                                <nav class="w-100">
                                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="product-about-tab" data-toggle="tab"
                                            href="#product-about" role="tab" aria-controls="product-about"
                                            aria-selected="true">About</a>
                                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                                            href="#system-requirements" role="tab" aria-controls="product-comments"
                                            aria-selected="false">System Requirements</a>
                                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
                                            href="#product-rating" role="tab" aria-controls="product-rating"
                                            aria-selected="false">Rating</a>
                                    </div>
                                </nav>
                                <div class="tab-content p-3 w-100" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="product-about" role="tabpanel"
                                        aria-labelledby="product-about-tab">
                                        <p>{{ $game->about }}</p>
                                    </div>
                                    <div class="tab-pane fade" id="system-requirements" role="tabpanel"
                                        aria-labelledby="product-comments-tab">

                                        {{-- <a href="/admin/game/addReq/{{ $game->gameId }}" class="btn btn-primary">Add
                                        Platform</a> --}}
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#addPlatform">Add Platform</button>
                                        <div class="tab-content">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>OS</th>
                                                        <th>Version</th>
                                                        <th>ChipSet</th>
                                                        <th>Memory</th>
                                                        <th>VGA</th>
                                                        <th>Storage</th>
                                                        <th>Function</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($system_req as $sys_teq => $value)
                                                        <tr>
                                                            <td>{{ $value->os }}</td>
                                                            <td>{{ $value->version }}</td>
                                                            <td>{{ $value->chip }}</td>
                                                            <td>{{ $value->ram }}</td>
                                                            <td>{{ $value->graphic }}</td>
                                                            <td>{{ $value->storage }}</td>
                                                            <td>
                                                                {{-- <a href="/admin/game/editReq/{{ $game->gameId }}/{{ $value->os }}"
                                                                        class="btn btn-primary">Edit</a> --}}
                                                                <button type="button" class="btn btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#demoModal{{ $value->os }}">Edit</button>

                                                                <button type="button" class="btn btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#delete{{ $value->os }}">Delete</button>
                                                            </td>
                                                        </tr>

                                                        {{-- Popup Delete Message --}}
                                                        <div class="modal fade" id="delete{{ $value->os }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="demoModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h3 class="text-center" style="color: red">WARNING
                                                                            !!!!!</h3>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h4>Sure to delete {{ $value->os }}
                                                                            platform!!!! I
                                                                            give you 5 seconds to think again</h4>
                                                                        <img src="{{ asset('img/rock-bald-head.gif') }}"
                                                                            class="fixed-ratio-resize" alt="...">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="/admin/game/deleteReq/{{ $game->gameId }}/{{ $value->os }}"
                                                                            class="btn btn-danger">Sure sure why
                                                                            not</a>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Maybe not
                                                                            today</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        {{-- Modal Edit Popup --}}
                                                        <div class="modal fade" id="demoModal{{ $value->os }}"
                                                            tabindex="-1" role="dialog" aria-
                                                            labelledby="demoModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form
                                                                    action="/admin/game/editReq/{{ $game->gameId }}/{{ $value->os }}"
                                                                    method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="demoModalLabel{{ $value->os }}">
                                                                                Edit Game Requirements for
                                                                                {{ $value->os }}
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria- label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="form-group row">
                                                                                <p>If you need to add more
                                                                                    platforms, add it
                                                                                    later, don't expect
                                                                                    anything good from this shit
                                                                                    website!!!
                                                                                    Cyka
                                                                                    Blyat !!!</p>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="os"
                                                                                    class="col-sm-2 col-form-label">OS</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="os"
                                                                                        placeholder="Type of Os"
                                                                                        name="os"
                                                                                        value="{{ $value->os }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="version"
                                                                                    class="col-sm-2 col-form-label">Version</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="version"
                                                                                        placeholder="Version"
                                                                                        name="version"
                                                                                        value="{{ $value->version }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="chipset"
                                                                                    class="col-sm-2 col-form-label">Chipset</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="test"
                                                                                        class="form-control"
                                                                                        id="chipset"
                                                                                        placeholder="Chipset Model"
                                                                                        name="chipset"
                                                                                        value="{{ $value->chip }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="memory"
                                                                                    class="col-sm-2 col-form-label">Memory</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="ram" placeholder="RAM"
                                                                                        name="ram"
                                                                                        value="{{ $value->ram }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="vga"
                                                                                    class="col-sm-2 col-form-label">VGA</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="vga"
                                                                                        placeholder="Graphic Card"
                                                                                        name="vga"
                                                                                        value="{{ $value->graphic }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="inputSkills"
                                                                                    class="col-sm-2 col-form-label">Storage</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="storage"
                                                                                        placeholder="Storage"
                                                                                        name="storage"
                                                                                        value="{{ $value->storage }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Save
                                                                                change</button>
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
                </div>
        </div>

    </section> <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- Modal Add Platform Popup Start-->
    <div class="modal fade" id="addPlatform" tabindex="-1" role="dialog" aria- labelledby="demoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="/admin/game/addReq/{{ $game->gameId }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Add New Platform</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <p>If you need to add more platforms, add it later, don't expect
                                anything good from this shit website!!! Cyka Blyat !!!</p>
                        </div>
                        <div class="form-group row">
                            <label for="os" class="col-sm-2 col-form-label">OS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="os" placeholder="Type of Os"
                                    name="os">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="version" class="col-sm-2 col-form-label">Version</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="version" placeholder="Version"
                                    name="version">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="chipset" class="col-sm-2 col-form-label">Chipset</label>
                            <div class="col-sm-10">
                                <input type="test" class="form-control" id="chipset" placeholder="Chipset Model"
                                    name="chipset">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="memory" class="col-sm-2 col-form-label">Memory</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ram" placeholder="RAM"
                                    name="ram">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="vga" class="col-sm-2 col-form-label">VGA</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="vga" placeholder="Graphic Card"
                                    name="vga">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Storage</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="storage" placeholder="Storage"
                                    name="storage">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add New</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Add Platform Popup End-->
    <!-- Modal Edit Type Popup Start-->
    <div class="modal fade" id="editType" tabindex="-1" role="dialog" aria- labelledby="demoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="/admin/game/editType/{{ $game->gameId }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Add or Delete Type</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <p>Uncheck type to delete</p>
                        </div>
                        @foreach ($cate_all as $value)
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id={{ $value->type }}
                                        value="{{ $value->type }}" name="category[]"
                                        @if ($category->contains('type', $value->type)) @checked(true) @endif>
                                    <label for="{{ $value->type }}"
                                        class="custom-control-label">{{ $value->type }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save change</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Edit type Popup End-->
    </section>
@endsection



@section('footer-script')
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

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "searching": false,
                "responsive": true,
                "lengthChange": false,
                "ordering": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('.date').datepicker({
                format: '{{ config('app.date_format_js') }}'
            });
        });
    </script>
@endsection
