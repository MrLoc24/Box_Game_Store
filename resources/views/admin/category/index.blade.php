@extends('layouts.dashboards')
@section('title', 'Category')
@section('content')
    <section>
        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">
            {{-- Message if success --}}
            @if ($message = Session::get('success'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <span>{{ $message }}</span>
                </div>
            @endif
            {{-- Message if error --}}
            @if (count($errors) > 0)
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Categories</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                                <li class="breadcrumb-item active">Categories</li>
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


                                <!-- /.card-body -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Type</th>
                                                <th>Function</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($type as $key => $value)
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset("$value->image") }}" width="50px"
                                                            height="50px" alt="{{ $value->type }}">
                                                    </td>
                                                    <td>
                                                        <p>{{ str_replace('_', ' ', $value->type) }}</p>
                                                    </td>

                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#demoModal{{ $key }}">Edit</button>

                                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                            data-target="#delete{{ $value->type }}">Delete</button>
                                                    </td>
                                                </tr>
                                                <!-- Delete Warning -->
                                                <div class="modal fade" id="delete{{ $value->type }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="text-center" style="color: red">WARNING !!!!!
                                                                </h3>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4>There is no turning back from here !!!!</h4>
                                                                <img src="{{ asset('img/please.gif') }}"
                                                                    class="fixed-ratio-resize" alt="...">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="/admin/category/delete/{{ $value->type }}"
                                                                    class="btn btn-danger" float="left">DELETE</a>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">CANCEL</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- Modal Form Popup Start-->
                                                <div class="modal fade" id="demoModal{{ $key }}" tabindex="-1"
                                                    role="dialog" aria- labelledby="demoModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <form action="/admin/category/edit/{{ $value->type }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="demoModalLabel{{ $key }}">
                                                                        Change Game Type</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria- label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group row">
                                                                        <label for="typeEdit{{ $key }}"
                                                                            class="col-sm-2 col-form-label">Type</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                                id="typeEdit{{ $key }}" required maxlength="45"
                                                                                placeholder="Type of Game" name="typeEdit"
                                                                                value="{{ str_replace('_', ' ', $value->type) }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="typeEditImage{{ $key }}"
                                                                            class="col-sm-2 col-form-label">Image</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="file" class="form-control"
                                                                                id="typeEditImage{{ $key }}"
                                                                                placeholder="Type's Image"
                                                                                name="typeEditImage">
                                                                            <input type="hidden" name="prev_pic"
                                                                                value="{{ $value->image }}">

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
                                        </tbody>
                                    </table>
                                </div>
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
                                                        @error('type.*')
                                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                                                            <br>
                                                        @enderror
                                                        <label for="type[0]" class="col-sm-2 col-form-label">Type</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="type[0]"
                                                                placeholder="Type of Game" name="type[0]" required
                                                                maxlength="45">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        @error('image.*')
                                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                                                            <br>
                                                        @enderror
                                                        <label for="image[0]"
                                                            class="col-sm-2 col-form-label">Image</label>

                                                        <div class="col-sm-10">
                                                            <input type="file" class="form-control" id="image[0]"
                                                                placeholder="Type's Image" name="image[0]" required>
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
                                                        class="fas fa-cloud-upload-alt"></i>
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
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
            var i = 0;
            $("#dynamic-ar").click(function() {
                ++i;
                $("#addOrRemove").append(
                    `<div class="tab-content" name="sysReq[` + i + `]">
                    <div class="form-group row">
                        <label for="type[` + i + `]" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="type[` + i + `]"
                                placeholder="Type of Game" name="type[` + i + `]" required maxlength="45">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image[` + i + `]" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="image[` + i + `]"
                                    placeholder="Type's Image" name="image[` + i + `]">
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
                "responsive": true,
                "lengthChange": false,
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
        });
    </script>
@endsection
