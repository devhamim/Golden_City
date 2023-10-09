@extends('admin.master')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add new accounts</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country Name <strong class="text-danger">*</strong></label>
                                        <select class="form-control select2bs4" style="width: 100%;">
                                            <option selected="selected">Alabama</option>
                                            <option>Alaska</option>
                                            <option>California</option>
                                            <option>Delaware</option>
                                            <option>Tennessee</option>
                                            <option>Texas</option>
                                            <option>Washington</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Name <strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Account Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bank Name <strong class="text-danger">*</strong></label>
                                        <input type="text"class="form-control" placeholder="Bank Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Number <strong class="text-danger">*</strong></label>
                                        <input type="number"class="form-control" placeholder="Account Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status <strong class="text-danger">*</strong></label>
                                        <select class="form-control" style="width: 100%;">
                                            <option selected="selected">Select</option>
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Details <strong class="text-danger">*</strong></label>
                                        <input type="text"class="form-control" placeholder="Details">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bank Logo <strong class="text-danger">*</strong></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
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
                                        <label>Payment procedure image <strong class="text-danger">*</strong></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
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
                                <input type="submit" class="btn btn-primary" value="Submit">
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
