@extends('admin.master')
@section('admin_content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Member withdraw request</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Date</th>
                <th>User Name</th>
                <th>Position</th>
                <th>Wallet Number</th>
                <th>Account Number</th>
                <th>Amount</th>
                <th>Transaction Fee</th>
                <th>Total Amount</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>2023-10-08 03:12:07</td>
                <td>arifbd2</td>
                <td>P1010772</td>
                <td>USDT TRC20</td>
                <td>hand cash</td>
                <td>80000 ৳</td>
                <td>8000 ৳</td>
                <td>88000 ৳</td>
                <td>
                    <a href="">
                        <strong class="text-danger">Cancel</strong>
                    </a>
                    <a href="">
                        <strong class="text-success">Accept</strong>
                    </a>
                </td>
              </tr>
              </tbody>
              <tfoot>
              <tr>
                <th>Date</th>
                <th>User Name</th>
                <th>Position</th>
                <th>Wallet Number</th>
                <th>Account Number</th>
                <th>Amount</th>
                <th>Transaction Fee</th>
                <th>Total Amount</th>
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