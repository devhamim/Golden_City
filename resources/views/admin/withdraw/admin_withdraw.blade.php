@extends('admin.master')
@section('admin_content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Admin withdraw</h3>
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
                <th>Comment</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>2023-01-19 03:45:44</td>
                <td>jamila</td>
                <td>P1010727</td>
                <td>USDT TRC20</td>
                <td>Bill adjust shika....</td>
                <td>20000 ৳</td>
                <td>dfgdfbvf</td>
              </tr>
              <tr>
                <td>2023-01-25 10:01:41</td>
                <td>jamila</td>
                <td>P1010727</td>
                <td>USDT TRC20</td>
                <td>Hand to hand cash...</td>
                <td>8200 ৳</td>
                <td>dfgdfbvf</td>
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
                <th>Comment</th>
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