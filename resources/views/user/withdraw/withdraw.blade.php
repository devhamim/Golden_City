@extends('admin.master')
@php
    $credit = isset($balance['credit']) ? $balance['credit'] : 0.0;
    $refferal = isset($balance['refferal']) ? $balance['refferal'] : 0.0;
    $shopping = isset($balance['shopping']) ? $balance['shopping'] : 0.0;

    $totalBalance = $credit + $refferal + $shopping;
@endphp
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-4">
                <!-- /.card -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between border-bottom mb-3">
                            <h3 class="card-title">Free Balance</h3>
                            <p style="font-weight: bold">${{ $shopping }}</p>
                        </div>
                        <div class="d-flex justify-content-between border-bottom mb-3">
                            <h3 class="card-title">Minimum withdrawal</h3>
                            <p style="font-weight: bold">$100</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Commission</h3>
                            <p style="font-weight: bold">8%</p>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-12 col-md-8">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Withdrawal</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.withdraw.request') }}" method="post">
                            @csrf
                            <div class="mb-2">
                                <input type="number" class="form-control @error('balance') is-invalid @enderror"
                                    name="balance" placeholder="Balance" value="{{ old('balance') }}">
                            </div>
                            <div class="mb-2">
                                <select name="wallet_type" class="form-control">
                                    <option value="">Select Wallet</option>
                                    <option value="1">TRC20 USDT</option>
                                </select>
                            </div>

                            <div class="mb-2">
                                <input type="text" class="form-control @error('wallet') is-invalid @enderror"
                                    name="wallet" placeholder="Your wallet" value="{{ old('wallet') }}">
                            </div>

                            <div class="mb-2">
                                <input type="text" class="form-control @error('pin') is-invalid @enderror" name="pin"
                                    placeholder="Pin" value="{{ old('pin') }}">
                            </div>

                            <div class="mb-2">
                                <button type="submit" class="btn btn-primary">Withdraw</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
@section('script')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                $(document).ready(function() {
                    toastr.error("{{ $error }}");
                });
            </script>
        @endforeach
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
@endsection
