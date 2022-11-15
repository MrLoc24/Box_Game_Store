@extends('layouts.dashboards')
@section('title', 'View Cart Details')
@section('header-specific')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Order Details List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                            <li class="breadcrumb-item active">Order Details List</li>
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

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Cart Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Cart Details ID</th>
                                            <th>CartID</th>
                                            <th>Game Name</th>
                                            <th>Game Icon</th>
                                            <th>Game Price</th>
                                            <th>Sale</th>
                                            <th>SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartDs as $key => $cartD)
                                            <tr>
                                                <td>{{ $cartD->cart_details_id }}</td>
                                                <td>{{ $cartD->cartId }}</td>
                                                <td>{{ str_replace('_', ' ', str_replace('__', ': ', $cartD->gameId)) }}
                                                </td>
                                                <td><img src="{{ asset("$cartD->gameIcon") }}" width="50px"
                                                        height="50px"></td>
                                                <td>{{ $cartD->gamePrice }}$</td>
                                                <td>
                                                    <button aria-disabled="true" class="btn btn-primary">
                                                        -{{ $cartD->gameSale }}%
                                                    </button>
                                                </td>
                                                <td>{{ round(($cartD->gamePrice * (100 - $cartD->gameSale)) / 100, 2) }}$
                                                </td>
                                            </tr>
                                            {{-- Popup delete message --}}
                                            {{-- <div class="modal fade" id="delete{{ $game->gameId }}" tabindex="-1"
                                                role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="text-center" style="color: red">WARNING !!!!!</h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Wanna delete this game? There is no
                                                                turning back from here !!!!</h4>
                                                            <img src="{{ asset('img/john-cena-are-you-sure-about-that.gif') }}"
                                                                class="rounded mx-auto d-block" alt="...">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="/admin/game/delete/{{ $game->gameId }}"
                                                                class="btn btn-danger">I'm the boss</a>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">No, I'm scared</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> --}}
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Cart Details ID</th>
                                            <th>CartID</th>
                                            <th>Game Name</th>
                                            <th>Game Icon</th>
                                            <th>Game Price</th>
                                            <th>Sale</th>
                                            <th>SubTotal</th>
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
