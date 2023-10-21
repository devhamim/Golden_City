@extends('admin.master')
@section('admin_content')
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Generation set</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('generation.set.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="generation_set_id" value="{{ $generation_set->id }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bonus (%)<strong
                                                class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            value="{{ $generation_set->bonus }}" name="bonus"
                                            placeholder="Only integer">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">C wallet (%)<strong
                                                class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            value="{{ $generation_set->c_wallet }}" name="c_wallet"
                                            placeholder="Only integer">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">R wallet (%)<strong
                                                class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            value="{{ $generation_set->r_wallet }}" name="r_wallet"
                                            placeholder="Only integer">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">S wallet (%)<strong
                                                class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            value="{{ $generation_set->s_wallet }}" name="s_wallet"
                                            placeholder="Only integer">
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
