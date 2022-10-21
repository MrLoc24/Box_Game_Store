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
                                    @foreach ($type as $value)
                                        <div class="form-group row">
                                            <div class="col">
                                                <p>{{ $value->type }}</p>
                                            </div>
                                            <div class="col-md-auto">
                                                <a href="#" class="btn btn-primary" float="left">Edit</a>
                                            </div>
                                            <div class="col col-lg-2">
                                                <a href="#" class="btn btn-danger" float="left">Delete</a>
                                            </div>
                                        </div>
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
                            <form action="/admin/game/create" enctype="multipart/form-data" method="POST">
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
                                                        <label for="os" class="col-sm-2 col-form-label">Type</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="type[0]"
                                                                placeholder="Type of Game" name="type[0]">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <!-- /.tab-pane -->
                                                {{-- <div class="tab-content">
                                                <!-- /.tab-pane -->
                                                {{-- <div class="form-group row">
                                                    <button type="button" name="add" id="dynamic-ar"
                                                        class="btn btn-outline-primary">Add Platform</button>
                                                </div> --}}
                                                {{-- <div class="form-group row">
                                                    <p>If you need to add more platforms, add it later, don't expect
                                                        anything good from this shit website!!! Cyka Blyat !!!</p>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="os" class="col-sm-2 col-form-label">OS</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="os"
                                                            placeholder="Type of Os" name="os">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="version" class="col-sm-2 col-form-label">Version</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="version"
                                                            placeholder="Version" name="version">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chipset" class="col-sm-2 col-form-label">Chipset</label>
                                                    <div class="col-sm-10">
                                                        <input type="test" class="form-control" id="chipset"
                                                            placeholder="Chipset Model" name="chipset">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="memory" class="col-sm-2 col-form-label">Memory</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="ram"
                                                            placeholder="RAM" name="ram">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="vga" class="col-sm-2 col-form-label">VGA</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="vga"
                                                            placeholder="Graphic Card" name="vga"></input>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputSkills" class="col-sm-2 col-form-label">Storage</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="storage"
                                                            placeholder="Storage" name="storage">
                                                    </div>
                                                </div>

                                                <hr>
                                            </div> --}}
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
                        <label for="os" class="col-sm-2 col-form-label">Type</label>
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
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
