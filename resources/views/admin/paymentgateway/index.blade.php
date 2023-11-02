@extends('admin.master')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 justify-content-center">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.payment.gateway.add') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" >
                                    </div>
                                    <div class="form-group">
                                        <label>Ac Number <span class="text-danger">*</span></label>
                                        <input type="text" name="ac_number" class="form-control @error('ac_number') is-invalid @enderror" >
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success" value="Add">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 justify-content-center">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Ac Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($paymentGatweays as $payment)
                            <tr>
                                <td>{{ $payment->name }}</td>
                                <td>{{ $payment->ac_number }}</td>
                                <td>
                                    @if($payment->status == 1)
                                        Show
                                    @else
                                        Hidden
                                    @endif
                                </td>
                                <td><a class="badge badge-info" href="{{ route('payment.gateway.edit', $payment->id) }}">Edit</a></td>
                            </tr>
                            @endforeach
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
