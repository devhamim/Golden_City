@extends('admin.master')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 m-auto justify-content-center">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('payment.gateway.upddate') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id" class="form-control" value="{{ $paymentGateways->id }}">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{ $paymentGateways->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Ac Number <span class="text-danger">*</span></label>
                                        <input type="text" name="ac_number" class="form-control" value="{{ $paymentGateways->ac_number }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Status <span class="text-danger">*</span></label>
                                        <div>
                                            <label for="show">Show</label>
                                            <input id="show" type="radio" name="status" value="1" {{ $paymentGateways->status == 1 ? 'checked' : '' }}>
                                        </div>
                                        <div>
                                            <label for="hidden">Hidden</label>
                                            <input id="hidden" type="radio" name="status" value="2" {{ $paymentGateways->status == 2 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success" value="Update">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
