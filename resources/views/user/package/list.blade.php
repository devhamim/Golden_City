@extends('admin.master')

@php
    $balance = Calculate::Balance();
    $credit = 0.0;
    $refferal = 0.0;
    $shopping = 0.0;

    // Check if the balance array has the corresponding keys and assign the formatted values
    if (isset($balance['credit']) && is_numeric($balance['credit'])) {
        $credit = $balance['credit'];
    }

    if (isset($balance['refferal']) && is_numeric($balance['refferal'])) {
        $refferal = $balance['refferal'];
    }

    if (isset($balance['shopping']) && is_numeric($balance['shopping'])) {
        $shopping = $balance['shopping'];
    }

    $totalBalance = $credit + $refferal + $shopping;
@endphp

@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header text-center mx-auto">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h3 class="mb-3">Package List</h3>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Duration</th>
                                    <th>You will Earn</th>
                                    <th>Comment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $package)
                                    <tr>
                                        <td class="name">{{ $package->name }}</td>
                                        <td class="font-weight-bold price">${{ number_format($package->price, 1) }}</td>
                                        <td>{{ $package->day }} Days</td>
                                        <td class="text-info font-weight-bold">
                                            ${{ number_format($package->target_price, 1) }}</td>
                                        <td>{{ $package->comment }}</td>

                                        <td class="text-center">
                                            @if ($credit >= (float) $package->price)
                                                <a href="{{ route('user.package.purchase', $package->id) }}"
                                                    class="btn btn-block bg-gradient-success btn-sm">Buy
                                                    Now</a>
                                            @else
                                                <p class="text-danger">Insufficient Balance</p>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
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
@endsection
