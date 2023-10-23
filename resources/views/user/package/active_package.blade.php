@extends('admin.master')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header bg-primary text-center mx-auto">
                        <h3 class="card-title">Active Package List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Package Name </th>
                                    <th>Package Amount</th>
                                    <th>Created Date</th>
                                    <th>Expired Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Joinning</td>
                                    <td>10</td>
                                    <td>08-11-2022</td>
                                    <td>28-10-2024</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Package Name </th>
                                    <th>Package Amount</th>
                                    <th>Created Date</th>
                                    <th>Expired Date</th>
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
