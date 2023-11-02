@extends('admin.master')
@php
    $balance = Calculate::Balance();
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
                        <form id="form_model" action="{{ route('user.transfer.request') }}" method="post">
                            @csrf
                            <input type="hidden" class="shopping" value="{{ $shopping }}">
                            <input type="hidden" class="refferal" value="{{ $refferal }}">
                            <div class="modal-body">

                                <div class="mb-3">
                                    <select name="wallet" class="form-control wallet @error('wallet') is-invalid @enderror"
                                        id="wallet">
                                        <option value="">Choose Wallet</option>
                                        <option value="refferal">Refferal</option>
                                        <option value="shopping">Shopping</option>
                                    </select>
                                    <span class="mb-3 text-success" id="balance" style="padding-left: 0.5rem"></span>
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
                                <button type="submit" class="btn btn-primary">Transfer</button>
                            </div>
                            {{-- <div class="modal-footer justify-content-between">
                            </div> --}}
                        </form>
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
                        <div class="row">
                            <div class="col-8 text-left text-bold">Total Transfer</div>
                            <div class="col-4 text-right text-bold text-success">$
                                {{ number_format(Balance::TransferBalance(Auth::user()->id), 1) }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Receiver</th>
                                    <th>Amount</th>
                                    <th>Wallet</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transfers as $transfer)
                                    <tr>
                                        <td class="name">{{ $transfer->receiver->username }}</td>
                                        <td class="font-weight-bold price text-success">
                                            ${{ number_format($transfer->balance) }}</td>
                                        <td>{{ $transfer->wallet_type }}</td>
                                        <td>
                                            {{ $transfer->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
                <div class="card">
                    <div class="card-header text-center">
                        <div class="row">
                            <div class="col-8 text-left text-bold">Total Receive</div>
                            <div class="col-4 text-right text-bold text-success">$
                                {{ number_format(Balance::receiveBalance(Auth::user()->id), 1) }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-bordered table-striped mb-3">
                            <thead>
                                <tr>
                                    <th>Sender</th>
                                    <th>Amount</th>
                                    <th>Wallet</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($receives as $transfer)
                                    <tr>
                                        <td class="name">{{ $transfer->user->username }}</td>
                                        <td class="font-weight-bold price text-success">
                                            ${{ number_format($transfer->balance) }}</td>
                                        <td>{{ $transfer->wallet_type }}</td>
                                        <td>
                                            {{ $transfer->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <span>
                            {{ $receives->links('pagination::bootstrap-5') }}
                        </span>
                    </div>
                </div>
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
    <script>
        $(document).ready(function() {
            $(".wallet").on("change", function() {
                let walletType = $(this).val();

                var shopping = $('.shopping').val();
                var refferal = $('.refferal').val();

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
