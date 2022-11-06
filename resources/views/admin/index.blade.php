@extends('layouts.dashboards')
@section('title', 'Admin Panel')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                            <li class="breadcrumb-item active">Admin Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if ($admin->image == null)
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('img/admin/default.png') }}" alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset("$admin->image") }}" alt="User profile picture">
                                    @endif

                                </div>

                                <h3 class="profile-username text-center">{{ $admin->name }}</h3>

                                <p class="text-muted text-center">{{ strtoupper($admin->role) }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Followers</b> <a class="float-right">0</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Following</b> <a class="float-right">0</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Friends</b> <a class="float-right">0</a>
                                    </li>
                                </ul>

                                <a href="https://www.facebook.com/NguyenTuanLoc2409"
                                    class="btn btn-primary btn-block"><b>Follow</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        {{-- <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                <p class="text-muted">
                                    Total washout. You want me to build this unit, stop sending me fucking clowns. Now if
                                    you'll excuse me, I am gonna go shoot myself in the fucking head.
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                <p class="text-muted">Malibu, California</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                <p class="text-muted">
                                    <span class="tag tag-danger">UI Design</span>
                                    <span class="tag tag-success">Coding</span>
                                    <span class="tag tag-info">Javascript</span>
                                    <span class="tag tag-warning">PHP</span>
                                    <span class="tag tag-primary">Node.js</span>
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                    fermentum enim neque.</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card --> --}}
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">

                                    <li class="nav-item"><a class="nav-link active" href="#edit" data-toggle="tab">Edit
                                            Profile</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Change
                                            Password</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">

                                    {{-- Edit Profile --}}
                                    <div class="active tab-pane" id="edit">
                                        <form class="form-horizontal" method="post"
                                            action="/admin/home/{{ $admin->adminId }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Login Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="loginName" class="form-control"
                                                        id="inputLoginName" placeholder="Login Name">
                                                </div>
                                                @error('loginName')
                                                    <p class="text-danger"><strong>{{ $message }}</strong></p>
                                                @enderror
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="adminEmail" class="form-control"
                                                        id="inputEmail" placeholder="Email">
                                                </div>
                                                @error('adminEmail')
                                                    <p class="text-danger"><strong>{{ $message }}</strong></p>
                                                @enderror
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="adminName" class="form-control"
                                                        id="inputName" placeholder="Display Name">
                                                </div>
                                                @error('adminName')
                                                    <p class="text-danger"><strong>{{ $message }}</strong></p>
                                                @enderror
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Picture</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="adminPicture" class="form-control"
                                                        id="inputPicture" placeholder="Picture Please">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <input type="submit" class="btn btn-success float-left"
                                                    value="Submit"></input>
                                                <button type="reset" class="btn btn-danger float-left"
                                                    style="margin-left: 3px">Reset</button>

                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    {{-- Edit Profile --}}
                                    <div class="tab-pane" id="password">
                                        <form class="form-horizontal" method="post"
                                            action="/admin/changePass/{{ $admin->adminId }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputPasswordOld" class="col-sm-2 col-form-label">Old
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="adminPassword" class="form-control"
                                                        id="inputPasswordOld" placeholder="Old Password">
                                                </div>
                                                @error('adminPassword')
                                                    <p class="text-danger"><strong>{{ $message }}</strong></p>
                                                @enderror
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPasswordNew" class="col-sm-2 col-form-label">New
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="adminPasswordNew" class="form-control"
                                                        id="inputPasswordNew" placeholder="New Password">
                                                </div>
                                                @error('adminPassword')
                                                    <p class="text-danger"><strong>{{ $message }}</strong></p>
                                                @enderror
                                            </div>
                                            <div class="form-group row">
                                                <label for="adminPasswordRetype" class="col-sm-2 col-form-label">Retype
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="adminPasswordRetype"
                                                        class="form-control" id="adminPasswordRetype"
                                                        placeholder="Retype Password">
                                                </div>
                                                @error('adminPassword')
                                                    <p class="text-danger"><strong>{{ $message }}</strong></p>
                                                @enderror
                                            </div>


                                            <div class="form-group row">
                                                <input type="submit" class="btn btn-success float-left"
                                                    value="Change Password"></input>
                                                <button type="reset" class="btn btn-danger float-left"
                                                    style="margin-left: 3px">Reset</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
