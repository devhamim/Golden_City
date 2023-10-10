@extends('admin.master')
@section('admin_content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Withdraw Balance: ৳ 1307294.60255</h3>
          </div>
          <div class="card-header">
            <h3 class="card-title text-danger">Minimum Withdrawal: 2000 ৳ </h3>
          </div>
          <div class="card-header">
            <h3 class="card-title text-success">Minimum Withdrawal: Unlimited ৳ </h3>
          </div>
          <div class="card-header bg-primary text-center mx-auto">
            <h3 class="card-title">All Withdraw History</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Withdraw Date</th>
                <th>Wallet Name</th>
                <th>Account Number</th>
                <th>Withdraw Type</th>
                <th>Withdraw Amount</th>
                <th>Status</th>
                <th>Comments</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>Abdul rafi</td>
                <td>abrafi</td>
                <td>P1010682</td>
                <td>P1010682</td>
                <td>P1010682</td>
                <td>P1010682</td>
                <td>P1010682</td>
              </tr>
              </tbody>
              <tfoot>
              <tr>
                <th>Withdraw Date</th>
                <th>Wallet Name</th>
                <th>Account Number</th>
                <th>Withdraw Type</th>
                <th>Withdraw Amount</th>
                <th>Status</th>
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