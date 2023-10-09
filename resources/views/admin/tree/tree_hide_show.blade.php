@extends('admin.master')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 justify-content-center">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">All member tree hide/show</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Show/Hide<span class="text-danger">*</span></label>
                                        <select class="form-control" style="width: 100%;">
                                            <option selected="selected">Select</option>
                                            <option>Show</option>
                                            <option>Hide</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success" value="Update">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
