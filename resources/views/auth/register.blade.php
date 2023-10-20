@extends('layouts.admin_app')
@section('body_content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>Golden</b>City</a>
            </div>
            <div class="card-body">
                @if (session()->has('error'))
                    <p class="login-box-msg text-danger">{{ session('error') }}</p>
                @endif

                <form method="POST" action="{{ url('/user/stores') }}">
                    @csrf
                    {{-- First Name --}}
                    <div class="input-group mb-3">
                        <input id="fName" type="text" class="form-control @error('fName') is-invalid @enderror"
                            name="fName" value="{{ old('fName') }}" placeholder="First Name" required
                            autocomplete="fName" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    {{-- Last Name --}}
                    <div class="input-group mb-3">
                        <input id="lName" type="text" class="form-control @error('lName') is-invalid @enderror"
                            name="lName" value="{{ old('lName') }}" placeholder="Last Name" required autocomplete="lName"
                            autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    {{-- Username --}}
                    <div class="input-group mb-3">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username') }}" placeholder="Username" required
                            autocomplete="username" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-tag"></span>
                            </div>
                        </div>
                    </div>

                    {{-- Reference --}}
                    <div class="input-group mb-3">
                        <input id="reference" type="text" class="form-control @error('reference') is-invalid @enderror"
                            name="reference" value="{{ old('reference') }}" placeholder="Reference ID*"
                            autocomplete="reference">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-users"></span>
                            </div>
                        </div>
                    </div>

                    {{-- Number --}}
                    <div class="input-group mb-3">
                        <input id="number" type="number" class="form-control @error('number') is-invalid @enderror"
                            name="number" value="{{ old('number') }}" placeholder="Number" required autocomplete="number"
                            autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-phone"></span>
                            </div>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email"
                            autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    {{-- Confirm Password --}}
                    <div class="input-group mb-3">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Confirm Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    {{-- Remember me --}}
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mt-2 mb-3">
                    {{-- <button type="submit" class="btn btn-primary btn-block">Sign In</button> --}}
                    {{-- <a href="#" class="btn btn-block btn-primary">
                        <i class=""></i> Sign In
                    </a> --}}
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html"></a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('login') }}" class="text-center">Sign In</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
