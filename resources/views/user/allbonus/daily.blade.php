@extends('admin.master')
@section('admin_content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8 text-left text-bold">Daily Income</div>
                    <div class="col-4 text-right text-bold text-success">$
                        {{ number_format(Balance::TotalDailyIncome(Auth::user()->id), 1) }}
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Bonus Day</th>
                            <th>Package</th>
                            <th>Amount</th>
                            <th>Bonus Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dailys as $daily)
                            <tr>
                                <td>{{ $daily->created_at->format('l') }} /
                                    <span>{{ $daily->created_at->format('h:i A') }}</span>
                                </td>
                                <td>{{ $daily->package->name }}</td>
                                <td class="text-success text-bold">${{ $daily->amount }}</td>
                                <td>{{ $daily->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
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
