@extends('layouts.dashboards')
@section('title', 'Add New Game')
@section('content')
    <section>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>New Game</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                                <li class="breadcrumb-item active">Add New Game</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <form action="/admin/game/create" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="container-fluid">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-6">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Game Details</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Game Name</label>
                                            <input type="text" class="form-control" name="gameName" id="name"
                                                placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Price</label>
                                            <input type="number" class="form-control" id="price" name="gamePrice"
                                                placeholder="Price">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <textarea rows="5" type="text" class="form-control" id="description" name="gameDescription"
                                                placeholder="Description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Release Date</label>
                                            <input type="date" class="form-control" id="date" name="gameDate"
                                                placeholder="Description">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Developer</label>
                                            <input type="text" class="form-control" id="publisher"
                                                placeholder="Developer" name="gameDeveloper">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Publisher Website</label>
                                            <input type="text" class="form-control" id="developer_website"
                                                placeholder="developer Website" name="developerWebsite">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Picture Icon</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="icon"
                                                        name="icon">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Gameplay Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile"
                                                        multiple name="gameplay[]">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose multiple
                                                        file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                                <!-- /.card -->



                            </div>
                            <!--/.col (left) -->
                            <!-- right column -->
                            <div class="col-md-6">
                                <!-- Form Element sizes -->
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">System Requirements</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-body">
                                                {{-- <div class="tab-content" id="addOrRemove" name="sysReq[0]">
                                                <!-- /.tab-pane -->
                                                <div class="form-group row">
                                                    <button type="button" name="add" id="dynamic-ar"
                                                        class="btn btn-outline-primary">Add Platform</button>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="os" class="col-sm-2 col-form-label">OS</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="os[0]"
                                                            placeholder="Type of Os" name="os[0]">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="version" class="col-sm-2 col-form-label">Version</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="version[0]"
                                                            placeholder="Version" name="version[0]">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="chipset" class="col-sm-2 col-form-label">Chipset</label>
                                                    <div class="col-sm-10">
                                                        <input type="test" class="form-control" id="chipset[0]"
                                                            placeholder="Chipset Model" name="chipset[0]">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="memory" class="col-sm-2 col-form-label">Memory</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="ram[0]"
                                                            placeholder="RAM" name="ram[0]">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="vga" class="col-sm-2 col-form-label">VGA</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="vga[0]"
                                                            placeholder="Graphic Card" name="vga[0]"></input>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputSkills"
                                                        class="col-sm-2 col-form-label">Storage</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="storage[0]"
                                                            placeholder="Storage" name="storage[0]">
                                                    </div>
                                                </div>
                                                <hr>
                                            </div> --}}
                                                <!-- /.tab-pane -->
                                                <div class="tab-content">
                                                    <!-- /.tab-pane -->
                                                    {{-- <div class="form-group row">
                                                    <button type="button" name="add" id="dynamic-ar"
                                                        class="btn btn-outline-primary">Add Platform</button>
                                                </div> --}}
                                                    <div class="form-group row">
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
                                                        <label for="version"
                                                            class="col-sm-2 col-form-label">Version</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="version"
                                                                placeholder="Version" name="version">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="chipset"
                                                            class="col-sm-2 col-form-label">Chipset</label>
                                                        <div class="col-sm-10">
                                                            <input type="test" class="form-control" id="chipset"
                                                                placeholder="Chipset Model" name="chipset">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="memory"
                                                            class="col-sm-2 col-form-label">Memory</label>
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
                                                        <label for="inputSkills"
                                                            class="col-sm-2 col-form-label">Storage</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="storage"
                                                                placeholder="Storage" name="storage">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <!-- /.tab-content -->
                                        </div><!-- /.card-body -->
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h3 class="card-title">Catelogy</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- checkbox -->
                                                @foreach ($type as $value)
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id={{ $value->type }} value="{{ $value->type }}"
                                                                name="category[]">
                                                            <label for="{{ $value->type }}"
                                                                class="custom-control-label">{{ $value->type }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                    <div class="form-row">
                        <div class="col-12" style="margin-bottom: 10px">
                            <button type="Submit" class="btn btn-success float-center"><i
                                    class="far fa-credit-card"></i>
                                Submit
                            </button>
                            <button type="reset" class="btn btn-danger float-center" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Reset All
                            </button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->
    {{-- Use to add more form in one session, but still not fingure out how to post to databse --}}
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#addOrRemove").append(
                `<br><div class="tab-content" name="sysReq[` + i + `]">
                    <div class="form-group row">
                        <label for="os" class="col-sm-2 col-form-label">OS</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="os[` + i + `]"
                                placeholder="Type of Os" name="os[` + i + `]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="version"
                            class="col-sm-2 col-form-label">Version</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="version[` + i + `]"
                                placeholder="Window version" name="version[` + i + `]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="chipset"
                            class="col-sm-2 col-form-label">Chipset</label>
                        <div class="col-sm-10">
                            <input type="test" class="form-control" id="chipset[` + i + `]"
                                placeholder="Chipset Model" name="chipset[` + i + `]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="memory"
                            class="col-sm-2 col-form-label">Memory</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ram[` + i + `]"
                                placeholder="RAM" name="ram[` + i + `]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="vga" class="col-sm-2 col-form-label">VGA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="vga[` + i + `]"
                                placeholder="Graphic Card" name="vga[` + i + `]"></input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSkills"
                            class="col-sm-2 col-form-label">Storage</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="storage[` + i + `]"
                                placeholder="Storage" name="storage[` + i + `]">
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-danger" id="remove-input-field">Delete</button>
                </form>`
            );
        });
        $(document).on('click', '#remove-input-field', function() {

            $(this).parent('div').remove();
        });
    </script> --}}

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
