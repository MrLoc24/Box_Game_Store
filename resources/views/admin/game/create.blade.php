@extends('layouts.dashboards')
@section('title', 'Add New Game')
@section('content')
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
                                        <input type="text" class="form-control" id="publisher" placeholder="Developer"
                                            name="gameDeveloper">
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
                                        <div class="card-header p-2">
                                            <ul class="nav nav-pills">

                                                <li class="nav-item"><a class="nav-link active" href="#window"
                                                        data-toggle="tab">Windows</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#mac"
                                                        data-toggle="tab">Mac</a></li>
                                            </ul>
                                        </div><!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <!-- /.tab-pane -->
                                                <div class="active tab-pane" id="window">

                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Win
                                                            OS</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="winOs"
                                                                placeholder="Window version" name="winOs">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail"
                                                            class="col-sm-2 col-form-label">Chipset</label>
                                                        <div class="col-sm-10">
                                                            <input type="test" class="form-control" id="chipset"
                                                                placeholder="Chipset Model" name="winChipset">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName2"
                                                            class="col-sm-2 col-form-label">Memory</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="ram"
                                                                placeholder="RAM" name="winRam">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputExperience"
                                                            class="col-sm-2 col-form-label">VGA</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="vga"
                                                                placeholder="Graphic Card" name="winVga"></input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputSkills"
                                                            class="col-sm-2 col-form-label">Storage</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="storage"
                                                                placeholder="Storage" name="winStorage">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.tab-pane -->

                                                <div class="tab-pane" id="mac">

                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Mac
                                                            OS</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="macOs"
                                                                placeholder="Apple Mac version" name="macOs">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail"
                                                            class="col-sm-2 col-form-label">Chipset</label>
                                                        <div class="col-sm-10">
                                                            <input type="test" class="form-control" id="macChipset"
                                                                placeholder="Chipset Model" name="macChipset">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName2"
                                                            class="col-sm-2 col-form-label">Memory</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="macRam"
                                                                placeholder="RAM" name="macRam">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputExperience"
                                                            class="col-sm-2 col-form-label">VGA</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="macVga"
                                                                placeholder="Graphic Card" name="macVga"></input>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputSkills"
                                                            class="col-sm-2 col-form-label">Storage</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="macStorage"
                                                                placeholder="Storage" name="macStorage"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.tab-pane -->
                                            </div>
                                            <!-- /.tab-content -->
                                        </div><!-- /.card-body -->
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->



                            <!-- general form elements disabled -->
                            <!-- /.card -->
                            <!-- general form elements disabled -->
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Catelogy</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox1" value="Adventure" name="category[]">
                                                    <label for="customCheckbox1"
                                                        class="custom-control-label">Adventure</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox2" value="MOBA" name="category[]">
                                                    <label for="customCheckbox2" class="custom-control-label">MOBA</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox3" value="FPS" name="category[]">
                                                    <label for="customCheckbox3" class="custom-control-label">FPS</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox4" value="PvP" name="category[]">
                                                    <label for="customCheckbox4" class="custom-control-label">PvP</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox5" value="PvE" name="category[]">
                                                    <label for="customCheckbox5" class="custom-control-label">PvE</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox6" value="Garden" name="category[]">
                                                    <label for="customCheckbox6"
                                                        class="custom-control-label">Garden</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox7" value="Family" name="category[]">
                                                    <label for="customCheckbox7"
                                                        class="custom-control-label">Family</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="customCheckbox8" value="Strategic" name="category[]">
                                                    <label for="customCheckbox8"
                                                        class="custom-control-label">Strategic</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <!-- /.card-body -->
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
                </div><!-- /.container-fluid -->
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

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
