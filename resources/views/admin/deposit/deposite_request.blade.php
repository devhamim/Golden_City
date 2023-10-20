@extends('admin.master')
@section('admin_content')
    {{-- Model --}}
    {{-- <div class="modal fade show" id="modal-default" style="display: block; padding-right: 17px;" aria-modal="true"
        role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>One fine body…</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> --}}


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Member deposit request</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>User Name</th>
                                    <th>Mail</th>
                                    <th>Account</th>
                                    <th>Transaction Number</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($requests as $request)
                                    <tr>
                                        <td>{{ $request->created_at }}</td>
                                        <td>{{ $request->user->username }}</td>
                                        <td>{{ $request->email }}</td>
                                        <td>{{ $request->wallet_type }}</td>
                                        <td>{{ $request->transaction_number }}</td>
                                        <td>{{ $request->amount }}</td>
                                        <td> <span
                                                class="badge bg-{{ $request->status == 'confirm' ? 'success' : 'danger' }}">{{ $request->status }}
                                            </span></td>
                                        <td><button type="button" class="btn btn-default" data-toggle="modal"
                                                data-target="#modal-default">
                                                Action
                                            </button></td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
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
