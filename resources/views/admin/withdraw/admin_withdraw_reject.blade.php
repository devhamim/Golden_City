@extends('admin.master')
@section('admin_content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Rejected withdraw list</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Rejected Date</th>
                <th>Position Name</th>
                <th>Account Name</th>
                <th>Account Number</th>
                <th>Amount</th>
                <th>Transaction Fee</th>
                <th>Total Amount</th>
                <th>Comment</th>
                <th>Admin User</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>2023-01-18 10:12:25</td>
                <td>sfwer</td>
                <td>P1010727</td>
                <td>This P1010727 to P10102</td>
                <td>This P1010727 to P10102</td>
                <td>This P1010727 to P10102</td>
                <td>This P1010727 to P10102</td>
                <td>This P1010727 to P10102</td>
                <td>This P1010727 to P10102</td>
              </tr>
              </tbody>
              <tfoot>
              <tr>
                <th>Rejected Date</th>
                <th>Position Name</th>
                <th>Account Name</th>
                <th>Account Number</th>
                <th>Amount</th>
                <th>Transaction Fee</th>
                <th>Total Amount</th>
                <th>Comment</th>
                <th>Admin User</th>
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