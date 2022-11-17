@extends('layouts.dashboards')
@section('title', 'Manager')
@section('header-specific')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
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
                        <h1>Manager</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                            <li class="breadcrumb-item active">All Manager</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNew">
                            Add Manager</button>
                        <hr>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Details</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Avatar</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Function</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $key => $admin)
                                            @if ($admin->role != 'boss')
                                                <tr>
                                                    <td><img src="{{ asset("$admin->image") }}" width="50px"
                                                            height="50px">
                                                    </td>

                                                    <td>{{ $admin->adminId }}</td>
                                                    <td>{{ $admin->name }}</td>
                                                    {{-- $game->column name!!!!!! --}}
                                                    <td>{{ $admin->email }}</td>
                                                    <td>
                                                        {{ $admin->role }}
                                                    </td>
                                                    <td>
                                                        @if ($admin->phone)
                                                            <a href="tel:{{ $admin->phone }}"
                                                                class="btn btn-primary">Call</a>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                            data-target="#delete{{ $admin->adminId }}">FIRED</button>
                                                        {{-- <button type="button" class="btn btn-success" data-toggle="modal"
                                                            data-target="#reset{{ $admin->adminId }}">Reset
                                                            Password</button> --}}
                                                        <a href="/admin/manager/resetPassword/{{ $admin->adminId }}"
                                                            class="btn btn-success">Reset Password</a>
                                                    </td>
                                                </tr>
                                                {{-- Popup delete message --}}
                                                <div class="modal fade" id="delete{{ $admin->adminId }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="text-center" style="color: red">WARNING!!!!!
                                                                </h3>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4>Sure you want to fired ? </h4>
                                                                <img src="{{ asset('img/please.gif') }}"
                                                                    class="fixed-ratio-resize" alt="...">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="/admin/manager/delete/{{ $admin->adminId }}"
                                                                    class="btn btn-danger">FIRED</a>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">CANCEL</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                {{-- Popup reset password --}}
                                                {{-- <div class="modal fade" id="reset{{ $admin->adminId }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                                    <form method="post"
                                                        action="/admin/manager/resetPassword/{{ $admin->adminId }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="text-center" style="color: red">So you want
                                                                        to
                                                                        reset
                                                                        {{ $admin->adminId }} password huh?
                                                                    </h3>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group row">
                                                                        <div class="col">
                                                                            <input type="text" class="form-control"
                                                                                id="password" placeholder="New Password"
                                                                                name="password">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col">
                                                                            <input type="password" class="form-control"
                                                                                placeholder="Password Retype"
                                                                                name="retypePassword">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="/admin/manager/resetPassword/{{ $admin->adminId }}"
                                                                        class="btn btn-danger">Reset</a>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div> --}}
                                            @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Avatar</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Function</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria- labelledby="demoModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="POST" action="/admin/manager/addNew">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Add New Manager</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <div class="col">
                                            <input type="text" class="form-control" id="adminId"
                                                placeholder="Admin ID" name="adminId">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col">
                                            <input type="text" class="form-control" id="Name" placeholder="Name"
                                                name="name">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col">
                                            <input type="email" class="form-control" placeholder="Email"
                                                name="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col">
                                            <input type="number" class="form-control" placeholder="Phone"
                                                name="phone">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Role"
                                                name="role">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <input type="password" class="form-control" placeholder="Password"
                                                name="password">
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
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
@section('footer-script')

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
