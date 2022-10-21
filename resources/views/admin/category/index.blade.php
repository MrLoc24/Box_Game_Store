@extends('layouts.dashboards')
@section('title', 'Category')
@section('content')
    <section>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Category</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                                <li class="breadcrumb-item active">Category</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Game Type</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- Type of game -->
                                    @foreach ($type as $key => $value)
                                        <div class="form-group row">
                                            <div class="col">
                                                <p>{{ $value->type }}</p>
                                            </div>
                                            <div class="col-md-auto">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#demoModal{{ $key }}">Edit</button>

                                            </div>
                                            <div class="col col-lg-2">
                                                <a href="/admin/category/delete/{{ $value->type }}" class="btn btn-danger"
                                                    float="left">Delete</a>
                                            </div>
                                        </div>
                                        <!-- Modal Form Popup Start-->
                                        <div class="modal fade" id="demoModal{{ $key }}" tabindex="-1"
                                            role="dialog" aria- labelledby="demoModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="/admin/category/edit/{{ $value->type }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="demoModalLabel{{ $key }}">
                                                                Change Game Type</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-
                                                                label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label for="typeEdit{{ $key }}"
                                                                    class="col-sm-2 col-form-label">Type</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="typeEdit{{ $key }}"
                                                                        placeholder="Type of Game" name="typeEdit"
                                                                        value="{{ $value->type }}">
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
                                        <!-- Modal Popup Example End-->
                                    @endforeach


                                </div>
                                <!-- /.card-body -->

                            </div>
                            <!-- /.card -->



                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">
                            <!-- Form Element sizes -->
                            <form action="/admin/category/create" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Add New</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="tab-content" id="addOrRemove" name="sysReq[0]">
                                                    <!-- /.tab-pane -->
                                                    <div class="form-group row">
                                                        <button type="button" name="add" id="dynamic-ar"
                                                            class="btn btn-outline-primary">Add Type</button>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="type[0]" class="col-sm-2 col-form-label">Type</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="type[0]"
                                                                placeholder="Type of Game" name="type[0]">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <!-- /.tab-content -->
                                            </div>
                                            <!-- /.tab-content -->
                                        </div><!-- /.card-body -->
                                        <div class="form-row">
                                            <div class="col-12" style="margin-bottom: 10px">
                                                <button type="Submit" class="btn btn-success float-center"><i
                                                        class="far fa-credit-card"></i>
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-danger float-center"
                                                    style="margin-right: 5px;">
                                                    <i class="fas fa-window-close"></i> Reset All
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>

                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </section>
        </div><!-- /.container-fluid -->

        <!-- /.content-wrapper -->
        {{-- Use to add more form in one session, but still not fingure out how to post to databse --}}
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
            var i = 0;
            $("#dynamic-ar").click(function() {
                ++i;
                $("#addOrRemove").append(
                    `<br><div class="tab-content" name="sysReq[` + i + `]">
                    <div class="form-group row">
                        <label for="type[` + i + `]" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="type[` + i + `]"
                                placeholder="Type of Game" name="type[` + i + `]">
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-danger" id="remove-input-field">Delete</button>
                    <hr>
                </div>`
                );
            });
            $(document).on('click', '#remove-input-field', function() {

                $(this).parent('div').remove();
            });
        </script>
    </section>
@endsection
@section('footer-script')
    <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
