@extends('admin.master')
@section('admin_content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Member archive bonus</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Member Name</th>
                <th>User Name</th>
                <th>Position Name</th>
                <th>Bonus Ammount</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>Abdul rafi</td>
                <td>abrafi</td>
                <td>P1010682</td>
                <td>0 ৳</td>
              </tr>
              </tbody>
              <tfoot>
              <tr>
                <th>Member Name</th>
                <th>User Name</th>
                <th>Position Name</th>
                <th>Bonus Ammount</th>
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