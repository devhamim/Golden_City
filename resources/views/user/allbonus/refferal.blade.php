@extends('admin.master')
@section('admin_content')
    <div class="container-fluid">

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
