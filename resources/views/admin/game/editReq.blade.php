@extends('layouts.dashboards')
@section('title', 'System Requirements Edit | Box Game')
@section('content')
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
                                            <input type="file" class="custom-file-input" id="icon" name="icon">
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
                                            <input type="file" class="custom-file-input" id="exampleInputFile" multiple
                                                name="gameplay[]">
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
                </div>
            </div>
        </form>

    @endsection
