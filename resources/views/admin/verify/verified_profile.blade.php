@extends('admin.master')

@php
    $credit = isset($balance['credit']) ? $balance['credit'] : 0.0;
    $refferal = isset($balance['refferal']) ? $balance['refferal'] : 0.0;
    $shopping = isset($balance['shopping']) ? $balance['shopping'] : 0.0;

    $totalBalance = $credit + $refferal + $shopping;
@endphp

@section('admin_content')
{{-- Model --}}
<div class="modal fade show" id="modal-default" style="display: none; padding-right: 17px;" aria-modal="true"
    role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Transfer Amount</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form_model" action="{{ route('user.transfer.request') }}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <select name="wallet" class="form-control wallet @error('wallet') is-invalid @enderror"
                            id="wallet">
                            <option value="">Choose Wallet</option>
                            <option value="refferal">Refferal</option>
                            <option value="shopping">Shopping</option>
                        </select>
                        <span class="mb-3" id="balance" style="padding-left: 0.5rem"></span>
                    </div>

                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                    <div class="row" id="payment_box">
                        <div class="col-12 col-md-6 mb-3">
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username" placeholder="Receiver username" value="{{ old('username') }}">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <input type="number" class="form-control @error('amount') is-invalid @enderror"
                                name="amount" placeholder="$0.00" value="{{ old('amount') }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class="card-title">Hello {{ Auth::user()->username }}</h3>
                        </div>
                        @if (Auth::user()->verified_status == null)
                            <div class="col-lg-6 text-danger">
                                <h3 class="card-title">Please verify your account</h3>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-3">
                    {{-- <p>We are happy to see you again.</p> --}}
                    <div>
                        
                        {{-- <button type="button" class="btn btn-danger action_button"
                            data-toggle="modal"data-target="#modal-default">Transfer</button>

                        <a class="btn btn-info" href="{{ route('user.deposit') }}">Deposit</a> --}}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>


            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Transaction History</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#editprofile"
                                    data-toggle="tab">Edit
                                    Profile</a></li>
                            {{-- @if (Auth::user()->verified_status == null)
                                <li class="nav-item"><a
                                        class="nav-link {{ Auth::user()->verified_status == 0 ? 'bg-danger' : '' }}"
                                        href="#accountverify" data-toggle="tab">Account Verify</a></li>
                            @endif
                            @if (Auth::user()->pin == null)
                                <li class="nav-item"><a class="nav-link" href="#pin" data-toggle="tab">Pin</a>
                                </li>
                            @else
                                <li class="nav-item"><a class="nav-link" href="#pinupdate" data-toggle="tab">Pin
                                        Update</a>
                                </li>
                            @endif --}}
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Change
                                    Password</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="editprofile">
                                <!-- Post -->
                                <form class="form-horizontal" action="{{ route('profile.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName"
                                                value="" name="user_name" placeholder="Name" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Number</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id=""
                                                value="" name="number" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Profile
                                            Photo</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                        id="exampleInputFile" name="image">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputpass" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputpass"
                                                name="password" placeholder="Entire Your Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms
                                                        and
                                                        conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="accountverify">
                                <form action="{{ route('user.nid.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">NID/Passport</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="exampleInputFile" name="image">
                                                            <label class="custom-file-label"
                                                                for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Email</label>
                                                    <input type="email" class="form-control"
                                                        id="exampleInputPassword1" name="email"
                                                        placeholder="Entire Email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" class="form-control"
                                                        id="exampleInputPassword1" name="password"
                                                        placeholder="Entire Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Check me
                                                out</label>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{-- <input type="submit" class="btn btn-primary" value="+ Add Member"> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-center mx-auto">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="+ Upload">
                                        </div>
                                    </div>
                                    {{-- <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div> --}}
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="pin">
                                <form class="form-horizontal" action="{{ route('set.pin') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Set Pin</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id=""
                                                name="pin" placeholder="Entire Your Pin">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputpass" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputpass"
                                                name="password" placeholder="Entire Your Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="pinupdate">
                                <form class="form-horizontal" action="{{ route('pin.update') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Old Pin</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id=""
                                                name="old_pin" placeholder="Entire Your Pin">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">New Pin</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id=""
                                                name="new_pin" placeholder="Entire New Pin">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputpass" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputpass"
                                                name="password" placeholder="Entire Your Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal" action="{{ route('change.password') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Old
                                            Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputpass"
                                                name="password" placeholder="Entire Old Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">New
                                            Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputpass"
                                                name="new_password" placeholder="Entire New Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Confirm New
                                            Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputpass"
                                                name="password_confirmation" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms
                                                        and
                                                        conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
                {{-- <span class="info-box-icon">{{ number_format($balance, 1) }}</span> --}}

                <div class="info-box-content">
                    <span class="info-box-text">Total Balance</span>
                    <h3 class="info-box-number">
                        ${{ number_format($totalBalance, 1) }}</h3>
                    <div class="progress-group">
                        <table>
                            <tr>
                                <td class="pr-3 credit">
                                    ${{ isset($balance['credit']) ? number_format($balance['credit'], 1) : '0.00' }}
                                </td>
                                <td>Credit</td>
                            </tr>
                            <tr>
                                <td class="refferal">
                                    ${{ isset($balance['refferal']) ? number_format($balance['refferal'], 1) : '0.00' }}
                                </td>
                                <td>Refferal</td>
                            </tr>
                            <tr>
                                <td class="shopping">
                                    ${{ isset($balance['shopping']) ? number_format($balance['shopping'], 1) : '0.00' }}
                                </td>
                                <td>Shopping</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="card">
                <div class="card-header">
                    <div class="">
                        <p class="card-title">Limit Balance</p>
                    </div>

                    <div class="card-tools">
                        <h5>500</h5>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer p-0">
                    <ul class="nav nav-pills flex-column">
                        @foreach ($packages as $package)
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    {{ $package->human_readable_duration }}
                                    <span class="float-right text-info">
                                        <i class="fas fa-arrow-up text-sm"></i>
                                        {{ number_format($package->target_price, 1) }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.footer -->
            </div>
            <!-- /.card -->

            <!-- PRODUCT LIST -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recently Added Products</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        <li class="item">
                            <div class="product-img">
                                <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">Samsung TV
                                    <span class="badge badge-warning float-right">$1800</span></a>
                                <span class="product-description">
                                    Samsung 32" 1080p 60Hz LED Smart HDTV.
                                </span>
                            </div>
                        </li>
                        <!-- /.item -->
                        <li class="item">
                            <div class="product-img">
                                <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">Bicycle
                                    <span class="badge badge-info float-right">$700</span></a>
                                <span class="product-description">
                                    26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                                </span>
                            </div>
                        </li>
                        <!-- /.item -->
                        <li class="item">
                            <div class="product-img">
                                <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">
                                    Xbox One <span class="badge badge-danger float-right">
                                        $350
                                    </span>
                                </a>
                                <span class="product-description">
                                    Xbox One Console Bundle with Halo Master Chief Collection.
                                </span>
                            </div>
                        </li>
                        <!-- /.item -->
                        <li class="item">
                            <div class="product-img">
                                <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">PlayStation 4
                                    <span class="badge badge-success float-right">$399</span></a>
                                <span class="product-description">
                                    PlayStation 4 500GB Console (PS4)
                                </span>
                            </div>
                        </li>
                        <!-- /.item -->
                    </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <a href="javascript:void(0)" class="uppercase">View All Products</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</div><!-- /.container-fluid -->
@endsection



@section('script')
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                toastr.error("Validation errors occurred. Please check the form.");
            });
        </script>
    @endif

    @if (session()->has('err'))
        <script>
            $(document).ready(function() {
                toastr.error("{{ session('err') }}");
            });
        </script>
    @endif

    @if (session()->has('succ'))
        <script>
            $(document).ready(function() {
                toastr.success("{{ session('succ') }}");
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $(".wallet").on("change", function() {
                let walletType = $(this).val();

                var shopping = $('.shopping').text();
                var refferal = $('.refferal').text();

                let balance = $('#balance');

                if (walletType == 'shopping') {
                    balance.text(shopping);
                }
                if (walletType == 'refferal') {
                    balance.text(refferal);
                }
            });

            // $(".status").on("change", function() {
            //     $("#payment_box").toggleClass("d-none");
            //     $('#comment_box').toggleClass("d-block");

            // });
            $('.toastrDefaultSuccess').click(function() {
                toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
        });
    </script>
@endsection
