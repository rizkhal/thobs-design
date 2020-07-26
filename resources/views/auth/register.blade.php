@extends("auth.layout", [
    "title" => "Silahkan Mendaftar Terlebih Dahulu"
])

@push('styles')
    <style type="text/css">
        /*//*/
    </style>
@endpush

@section("auth")
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="left">
                    <div class="content">
                        <div class="header">
                            <div class="logo text-center" style="margin-top: 2.5rem!important;">
                                <img src="{{ asset('images/logo.jpg') }}" alt="Klorofil Logo">
                            </div>
                            <p class="lead" style="margin-top: 2rem;">Form Register</p>
                        </div>
                        <form method="POST" class="form-auth-small" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label class="control-label sr-only">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email">
                                @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label sr-only">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                @error('password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group clearfix">
                                <label class="fancy-checkbox element-left">
                                    <input type="checkbox" name="remember">
                                    <span>Remember me</span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">DAFTAR</button>
                            <div class="bottom">
                                <span class="helper-text"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Lupa password?</a></span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="right" style="background-image: url('{{ asset("images/login-bg.jpg") }}')">
                    <div class="overlay"></div>
                    <div class="content text">
                        <h1 class="heading">Silahkan Login Terlebih Dahulu.</h1>
                        <p>Anda dapat melakukan order setelah melakukan login.&nbsp;<i class="fa fa-heart text-danger"></i></p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@stop



{{-- @extends('auth.layout', [
    "Silahkan Daftar Terlebih Dahulu"      
])

@section('auth')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}
