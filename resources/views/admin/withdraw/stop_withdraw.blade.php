@extends('admin.master')
@section('admin_content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Member stop withdraw</h3>
          </div>
          <div class="card-header  text-danger text-center mx-auto">
            <h3 class="card-title"><strong>Member list</strong></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Name</th>
                <th>User Name</th>
                <th>Position Name</th>
                <th>Withdraw Status</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>GoldenFuture</td>
                <td>goldenfutureuser</td>
                <td>P10102</td>
                <td><strong class="text-success">Enable</strong></td>
                <td>
                   <div>
                    <a href=""><strong class="text-danger">Disabled Withdraw</strong></a>
                   </div>
                   <div>
                    <a href=""><strong class="text-success">Enable Withdraw</strong></a>
                   </div>
                </td>
              </tr>
              </tbody>
              <tfoot>
              <tr>
                <th>Name</th>
                <th>User Name</th>
                <th>Position Name</th>
                <th>Withdraw Status</th>
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