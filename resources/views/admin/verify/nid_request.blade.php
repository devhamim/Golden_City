@extends('admin.master')
@section('admin_content')
    {{-- Model --}}
    <div class="modal fade show" id="modal-default" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">User Verify Request</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="form_model" action="{{ route('nid.request.status') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="text" class="form-control d-none" name="id" readonly>
                        <input type="text" class="form-control d-none" name="user_id" readonly>
                        <div class="mb-3">
                            <select name="status" class="form-control status" id="">
                                <option value="confirm">Confirm</option>
                                <option value="cancel">Cancel</option>
                            </select>
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
                    <div class="card-header">
                        <h3 class="card-title text-{{ session()->has('succ') ? 'info' : '' }}">
                            @if (session()->has('succ'))
                                {{ session('succ') }}
                            @else
                                User Request For Account Verify
                            @endif
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="d-none">id</th>
                                    <th class="d-none">user_id</th>
                                    <th>Date</th>
                                    <th>NID</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($requests as $request)
                                    <tr>
                                        <td class="d-none">{{ $request->id }}</td>
                                        <td class="d-none">{{ $request->user_id }}</td>
                                        <td>{{ $request->created_at }}</td>
                                        <td style="width: 70px;">
                                            <a href="{{ asset('files/nid/'. $request->id_card) }}" data-toggle="lightbox" data-title="{{ $request->user->username }}" data-gallery="gallery">
                                                <img src="{{ asset('files/nid/'. $request->id_card) }}" class="img-fluid mb-2" alt="black sample"/>
                                              </a>
                                        </td>
                                        <td> <span class="badge bg-warning">{{ $request->status }}
                                            </span></td>
                                        <td>
                                            <button type="button" class="btn btn-info action_button" data-toggle="modal"
                                                data-target="#modal-default">
                                                Action
                                            </button>
                                        </td>
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
@section('script')
    <script>
        $(document).ready(function() {
            $(".action_button").on("click", function() {
                var row = $(this).closest("tr");

                var id = row.find("td:eq(0)").text();
                var user_id = row.find("td:eq(1)").text();
                var username = row.find("td:eq(3)").text();
                var amount = row.find("td:eq(7)").text();

                $("input[name='id']").val(id);
                $("input[name='user_id']").val(user_id);
                $("input[name='username']").val(username);
                $("input[name='amount']").val(amount);
            });

            $(".status").on("change", function() {
                $("#payment_box").toggleClass("d-none");
                $('#comment_box').toggleClass("d-block");

            });
        });
    </script>
@endsection
