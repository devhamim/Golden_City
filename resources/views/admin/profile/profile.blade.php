@extends('admin.master')
@section('admin_content')
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('err'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ session('err') }}</li>
            </ul>
        </div>
        @endif
        @if (session('succ'))
        <div class="alert alert-success">
            <ul>
                <li>{{ session('succ') }}</li>
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('files/profile/'. $profile->profile) }}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $profile->username }}</h3>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#editprofile" data-toggle="tab">Edit Profile</a></li>
                            @if(Auth::user()->verified_status == null)
                            <li class="nav-item"><a class="nav-link {{ Auth::user()->verified_status == 0 ? 'bg-danger' : '' }}" href="#accountverify" data-toggle="tab">Account Verify</a></li>
                            @endif
                            @if (Auth::user()->pin == null)
                                <li class="nav-item"><a class="nav-link" href="#pin" data-toggle="tab">Pin</a></li>
                            @else
                                <li class="nav-item"><a class="nav-link" href="#pinupdate" data-toggle="tab">Pin Update</a>
                                </li>
                            @endif
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Change Password</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="editprofile">
                                <!-- Post -->
                                <form class="form-horizontal" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName"
                                                value="{{ $profile->username }}" name="user_name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Number</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id=""
                                                value="{{ $profile->number }}" name="number" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Profile Photo</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile"
                                                        name="image">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputpass" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputpass" name="password"
                                                placeholder="Entire Your Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms and
                                                        conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="accountverify">
                                <form action="{{ route('user.nid.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">NID/Passport</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="exampleInputFile" name="image">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Email</label>
                                                    <input type="email" class="form-control" id="exampleInputPassword1"
                                                        name="email" placeholder="Entire Email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" class="form-control"
                                                        id="exampleInputPassword1" name="password"
                                                        placeholder="Entire Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{-- <input type="submit" class="btn btn-primary" value="+ Add Member"> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-center mx-auto">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="+ Upload">
                                        </div>
                                    </div>
                                    {{-- <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div> --}}
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="pin">
                                <form class="form-horizontal" action="{{ route('set.pin') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Set Pin</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="" name="pin"
                                                placeholder="Entire Your Pin">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputpass" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputpass" name="password"
                                                placeholder="Entire Your Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="pinupdate">
                                <form class="form-horizontal" action="{{ route('pin.update') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Old Pin</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="" name="old_pin"
                                                placeholder="Entire Your Pin">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">New Pin</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="" name="new_pin"
                                                placeholder="Entire New Pin">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputpass" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputpass" name="password"
                                                placeholder="Entire Your Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal" action="{{ route('change.password') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputpass" name="password"
                                                placeholder="Entire Old Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">New Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputpass"
                                                name="new_password" placeholder="Entire New Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Confirm New
                                            Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputpass"
                                                name="password_confirmation" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms and
                                                        conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
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
@endsection
