@extends('admin.master')

@php
    $credit = isset($balance['credit']) ? $balance['credit'] : 0.0;
    $refferal = isset($balance['refferal']) ? $balance['refferal'] : 0.0;
    $shopping = isset($balance['shopping']) ? $balance['shopping'] : 0.0;

    $totalBalance = $credit + $refferal + $shopping;
@endphp

@if (Auth::user()->role == 'admin')
    @section('admin_content')
        //admin
    @endsection
@else
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
                                <button type="button" class="btn btn-danger action_button"
                                    data-toggle="modal"data-target="#modal-default">Transfer</button>

                                <a class="btn btn-info" href="{{ route('user.deposit') }}">Deposit</a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <hr>

                    <!--Tab -->
                    <div class="row">
                        {{-- Total Income --}}
                        <div class="col-12 col-md-4 col-lg-3">
                            <div class="card  bg-warning p-3">
                                <p style="color: black" class="text-bold">Total Bonus</p>
                                <h5 class="text-bold" style="color:black">
                                    ${{ number_format(Balance::TotalBonus(Auth::user()->id), 1) }}</h5>
                            </div>
                        </div>
                        {{-- Daily Bonus --}}
                        <div class="col-12 col-md-4 col-lg-3">
                            <a href="{{ route('user.daily.bonus') }}">
                                <div class="card p-3">
                                    <p style="color: black">Daily Bonus</p>
                                    <h5 class="text-bold" style="color:#17a2b8">
                                        ${{ number_format(Balance::TotalDailyIncome(Auth::user()->id), 1) }}</h5>
                                </div>
                            </a>
                        </div>
                        {{-- Refferal --}}
                        <div class="col-12 col-md-4 col-lg-3">
                            <a href="{{ route('user.refferal.bonus') }}">
                                <div class="card p-3">
                                    <p style="color: black">Refferal Bonus</p>
                                    <h5 class="text-bold" style="color:#17a2b8">
                                        ${{ number_format(Balance::RefferalIncome(Auth::user()->id), 1) }}</h5>
                                </div>
                            </a>
                        </div>
                        {{-- Generation --}}
                        <div class="col-12 col-md-4 col-lg-3">
                            <a href="{{ route('user.generation.bonus') }}">
                                <div class="card p-3">
                                    <p style="color: black">Generation Bonus</p>
                                    <h5 class="text-bold" style="color:#17a2b8">
                                        ${{ number_format(Balance::GenerationIncome(Auth::user()->id), 1) }}</h5>
                                </div>
                            </a>
                        </div>
                        {{-- Matcing --}}
                        <div class="col-12 col-md-4 col-lg-3">
                            <a href="{{ route('user.matching.bonus') }}">
                                <div class="card p-3">
                                    <p style="color: black">Matcing Bonus</p>
                                    <h5 class="text-bold" style="color:#17a2b8">
                                        ${{ number_format(Balance::MatchingIncome(Auth::user()->id), 1) }}</h5>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- /.col -->

                <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3">
                        {{-- <span class="info-box-icon">{{ number_format($balance, 1) }}</span> --}}

                        <div class="info-box-content">
                            <span class="info-box-text">Total Balance</span>
                            <h3 class="info-box-number text-success">
                                ${{ number_format($totalBalance, 1) }}
                            </h3>
                            <div class="progress-group">
                                <table>
                                    <tr>
                                        <td class="pr-3 credit text-bold text-info">
                                            ${{ isset($balance['credit']) ? number_format($balance['credit'], 1) : '0.00' }}
                                        </td>
                                        <td>Credit</td>
                                    </tr>
                                    <tr>
                                        <td class="refferal text-bold text-info">
                                            ${{ isset($balance['refferal']) ? number_format($balance['refferal'], 1) : '0.00' }}
                                        </td>
                                        <td>Refferal</td>
                                    </tr>
                                    <tr>
                                        <td class="shopping text-bold text-info">
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
                                <p class="card-title">You Can Earn</p>
                            </div>

                            <div class="card-tools">
                                <h5 class="text-success text-bold">
                                    ${{ number_format(Calculate::EarnLimit(Auth::user()->id), 1) }}
                                </h5>
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

                </div>
                <!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    @endsection
@endif



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
