@extends('admin.master')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title bg-primary">All Member Bkash Access List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>User Name</th>
                                    <th>Position Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>GoldenFuture</td>
                                    <td>goldenfutureuser</td>
                                    <td>P10102</td>
                                    <td>
                                        <strong class="text-success">Cancel</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>MD.golden mia</td>
                                    <td>Goldenmia</td>
                                    <td>P1010644</td>
                                    <td>
                                        <strong class="text-danger">Inactive</strong>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>User Name</th>
                                    <th>Position Name</th>
                                    <th>Action</th>
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
@endsection
