@extends('admin.master')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Daily bonus set</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="" action="{{ route('daily.bonus.set.update') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Select A Bonus Set<span class="text-danger">*</span></label>
                                        <select class="form-control" name="bonus_type" style="width: 100%;">
                                            <option selected="selected">Select</option>
                                            <option value="daily">Daily Bonus Set</option>
                                            <option value="refferal">Reference Bonus Set</option>
                                            <option value="matching">Generation Bonus Set</option>
                                            <option value="generation">Matching Bonus Set</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bonus (%)<strong
                                                class="text-danger">*</strong></label>
                                        <input type="number" class="form-control" id="exampleInputEmail1" name="bonus"
                                            placeholder="Only integer" max="100">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">C wallet (%)<strong
                                                class="text-danger">*</strong></label>
                                        <input type="number" class="form-control" id="exampleInputEmail1" name="c_wallet"
                                            value="0" min="0" max="100">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">R wallet (%)<strong
                                                class="text-danger">*</strong></label>
                                        <input type="number" class="form-control" id="exampleInputEmail1" name="r_wallet"
                                            value="0" min="0" max="100">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">S wallet (%)<strong
                                                class="text-danger">*</strong></label>
                                        <input type="number" class="form-control" id="exampleInputEmail1" name="s_wallet"
                                            value="0" min="0" max="100">
                                    </div>
                                </div>
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
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </div>
                        {{-- <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
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
