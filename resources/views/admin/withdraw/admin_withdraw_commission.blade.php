@extends('admin.master')
@section('admin_content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">All Member Withdraw Commission</h3>
          </div>
          <div class="card-header bg-gradient-fuchsia text-white text-center mx-auto">
            <h3 class="card-title"><strong>Withdraw Commission (319277.7600000001৳)</strong></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Commission Date</th>
                <th>Position ID</th>
                <th>Withdraw Type</th>
                <th>Commission Amount</th>
                <th>Percent</th>
                <th>Comments</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>2023-01-18 10:12:25</td>
                <td>P1010727</td>
                <td>Transfer Other Member</td>
                <td>0 ৳</td>
                <td>0 %</td>
                <td>This P1010727 to P10102</td>
              </tr>
              </tbody>
              <tfoot>
              <tr>
                <th>Commission Date</th>
                <th>Position ID</th>
                <th>Withdraw Type</th>
                <th>Commission Amount</th>
                <th>Percent</th>
                <th>Comments</th>
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