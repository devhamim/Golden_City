@extends('admin.master')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 m-auto justify-content-center">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.vate.set.add') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Vate Set <span class="text-danger">*</span></label>
                                        <select name="vate_set" id="" class="form-control @error('vate_set') is-invalid @enderror">
                                            <option value="">Select</option>
                                            @if($vatesets->isEmpty())
                                            <option value="wridro">Wridro</option>
                                            <option value="transfer">Transfer</option>
                                        @else
                                            <option value="wridro" {{ $vatesets[0]->vate_set == 'wridro' ? 'selected' : '' }}>Wridro</option>
                                            <option value="transfer" {{ $vatesets[0]->vate_set == 'transfer' ? 'selected' : '' }}>Transfer</option>
                                        @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Fee <span class="text-danger">*</span></label>
                                        @if($vatesets->isEmpty())
                                            <input type="text" name="fee" class="form-control @error('fee') is-invalid @enderror">
                                        @else
                                            @foreach ($vatesets as $vateset)
                                                <input type="text" name="fee" class="form-control @error('fee') is-invalid @enderror" value="{{ $vateset->fee }}">
                                            @endforeach
                                        @endif
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
