@extends('admin.master')
@section('admin_content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-12 col-6 text-center">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Total Deposit</h3>
                    <h3>40,084,515.00 ৳</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-6 text-center">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h4>Total Deposit</h4>
                    <h4>40,084,515.00 ৳</h4>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6 text-center">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h4>Total Withdraw</h4>
                    <h4>4,875,955.88 ৳</h4>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6 text-center">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h4>Total Withdraw Commission</h4>
                    <h4>319,277.76 ৳</h4>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
</div><!-- /.container-fluid -->
@endsection