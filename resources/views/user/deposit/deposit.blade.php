@extends('admin.master')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-12 col-md-4">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-danger ">Note: If you send fake deposit request , Must be terminated your
                            account</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('user.deposit.request') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <select class="form-control select2bs4" name="country" style="width: 100%;">
                                            <option selected="selected">Country</option>
                                            <option value="BD">Bangladesh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Choose Wallet</label>
                                        <select class="form-control select2bs4" id="wallet_type" name="wallet_type"
                                            style="width: 100%;">
                                            <option selected value="TRC20">USDT-TRC20</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email" class="form-control" name="email" id="exampleInputPassword1"
                                            placeholder="example@gmail.com">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Send to this account</label>
                                        <input type="text" class="form-control" id="wallet_address"
                                            value="TCcYyfWqP1QeQ8ij87eHFoj4Cf5RL3hjYS" placeholder="Account" disabled>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Deposit Amount</label>
                                        <input type="number" name="amount" class="form-control" id=""
                                            placeholder="0.00">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Pin</label>
                                        <input type="number" class="form-control" id="" name="pin"
                                            placeholder="123">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Transaction ID</label>
                                        <input type="text" class="form-control" id="" name="transaction_number"
                                            placeholder="Your Transaction Number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
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
                                <input type="submit" class="btn btn-success" value="Submit">
                            </div>
                        </div>
                        {{-- <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div> --}}
                    </form>
                </div>
            </div>

            <div class="col-12 col-md-8">
                <div class="card p-2">
                    <div class="card-header">
                        <h4 class="text-right">Total Deposit <span
                                class="ml-3 text-success">${{ number_format($totalDeposit) }}</span>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="get">
                            <div class="row">
                                <div class="mr-2 mb-2 d-flex align-items-center">
                                    <label class="mr-2" for="">Start</label>
                                    <input type="date" class="form-control" name="start">
                                </div>
                                <div class="mr-2 mb-2 d-flex align-items-center">
                                    <label class="mr-2" for="">End</label>
                                    <input type="date" class="form-control" name="end">
                                </div>

                                <div class="mr-2 mb-2 d-flex align-items-center">
                                    <button type="submit" class="btn btn-secondary">Search</button>
                                </div>

                            </div>
                        </form>
                    </div>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Transaction Number</th>
                                <th>Wallet Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($depositsRequest as $request)
                                <tr>
                                    <td>{{ $request->transaction_number }}</td>
                                    <td>{{ $request->wallet_type }}</td>
                                    <td class="text-{{ $request->status == 'cancel' ? 'danger' : 'success' }}">
                                        ${{ $request->amount }}</td>
                                    <td> <span
                                            class="badge bg-{{ ($request->status == 'pending' ? 'info' : $request->status == 'confirm') ? 'primary' : 'danger' }}">{{ $request->status }}
                                        </span>
                                    </td>
                                    <td>{{ $request->created_at->format('d M Y') }}</td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
