@extends('admin.master')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Fake news update</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Last month paid<strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                           value="6508989$">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Total registered users<strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                           value="60,67586">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Total deposit<strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                           value="1206575757$d">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Total withdraw<strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                           value="4787867$">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Total Country<strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                           value="15">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Extra field -1<strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                           value="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Extra field -2<strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                           value="0">
                                    </div>
                                </div>
                               
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
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </div>
                        {{-- <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
