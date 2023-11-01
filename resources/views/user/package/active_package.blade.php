@extends('admin.master')
@php
    use Carbon\Carbon;
@endphp
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Package Name </th>
                                    <th>Package Amount</th>
                                    <th>Status</th>
                                    <th>Expired Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $package)
                                    <tr>
                                        <td>{{ $package->activePackage->name }}</td>
                                        <td>{{ number_format($package->price, 1) }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $package->status == 1 ? 'info' : 'danger' }}">{{ $package->status == 1 ? 'Active' : 'Deactive' }}
                                            </span>
                                        </td>
                                        <td>{{ Carbon::parse($package->duration)->format('d M, Y') }}</td>
                                    </tr>
                                @endforeach
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
