@extends('admin.master')
@section('admin_content')
    {{-- Model --}}
    <div class="modal fade show" id="modal-default" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create New Package</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="form_model" action="{{ route('member.packge.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Package name" value="{{ old('name') }}">
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    name="price" placeholder="Price" value="{{ old('price') }}">
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <input type="number" class="form-control @error('day') is-invalid @enderror" name="day"
                                    placeholder="Days" value="{{ old('day') }}">
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <input type="number" class="form-control @error('t_price') is-invalid @enderror"
                                    name="t_price" placeholder="Profit Price" value="{{ old('t_price') }}">
                            </div>

                            <div class="col-12">
                                <textarea type="text" rows="4" class="form-control @error('comment') is-invalid @enderror" name="comment"
                                    placeholder="Comments" value="{{ old('comment') }}"></textarea>
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
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Member package list</h3>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                            Add Package
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Duration</th>
                                    <th>Expected amount</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $package)
                                    <tr>
                                        <td>{{ $package->name }}</td>
                                        <td>{{ $package->price }}</td>
                                        <td>{{ $package->day }}</td>
                                        <td>{{ $package->target_price }}</td>
                                        <td>{{ $package->comment }}</td>
                                        <td><span
                                                class="badge bg-{{ $package->status == 1 ? 'primary' : 'danger' }}">{{ $package->status == 1 ? 'Active' : 'Deactive' }}</span>
                                        </td>
                                        <td>{{ $package->created_at->diffForHumans() }}</td>
                                        <td>Active</td>
                                    </tr>
                                @endforeach
                                </tfoot>
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
