@extends('admin.master')
@section('admin_content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Admin deposit</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Date</th>
                <th>User Name</th>
                <th>Position</th>
                <th>Account Number</th>
                <th>Wallet Name</th>
                <th>Admin Account Number</th>
                <th>Amount</th>
                <th>Comment</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>2022-11-08 09:30:03</td>
                <td>Newtest</td>
                <td>P1010645</td>
                <td>zia.gajipur@gmail.com</td>
                <td>USDT TRC20</td>
                <td>TCcYyfWqP1QeQ8ij87eHFoj4Cf5RL3hjYS</td>
                <td>0 ৳</td>
                <td>dfgdfbvf</td>
              </tr>
              <tr>
                <td>2022-11-08 09:30:03</td>
                <td>Newtest</td>
                <td>P1010645</td>
                <td>zia.gajipur@gmail.com</td>
                <td>USDT TRC20</td>
                <td>TCcYyfWqP1QeQ8ij87eHFoj4Cf5RL3hjYS</td>
                <td>0 ৳</td>
                <td>dfgdfbvf</td>
              </tr>
              </tbody>
              <tfoot>
              <tr>
                <th>Date</th>
                <th>User Name</th>
                <th>Position</th>
                <th>Account Number</th>
                <th>Wallet Name</th>
                <th>Admin Account Number</th>
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