@extends('admin.master')
@section('admin_content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Account Verified</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Request Date</th>
                <th>Member Position</th>
                <th>NID</th>
                <th>Electric Bill</th>
                <th>Utility Bill</th>
                <th>Action</th>
                <th>Status</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>2023-09-27 00:05:37</td>
                <td>P1010989</td>
                <td>
                    <a href="">Download</a>
                </td>
                <td>
                    <a href="">Download</a>
                </td>
                <td>
                    <a href="">Download</a>
                </td>
                <td class="">
                    <a href="" class="text-red">
                        <strong>Cancel</strong>
                    </a>
                    <a href="" class="text-green">
                        <strong>Confirm</strong>
                    </a>
                </td>
                <td>
                  <a href="" class="text-success"><strong>Verified</strong></a>
              </td>
              </tr>
              </tbody>
              <tfoot>
              <tr>
                <th>Request Date</th>
                <th>Member Position</th>
                <th>NID</th>
                <th>Electric Bill</th>
                <th>Utility Bill</th>
                <th>Action</th>
                <th>Status</th>
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