@extends("auth.layout")
@section("auth")

@push('styles')
    <style type="text/css">
        /*//*/
    </style>
@endpush

<!-- WRAPPER -->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="left">
                    <div class="content">
                        <div class="header">
                            <div class="logo text-center" style="margin-top: 2.5rem!important;">
                                <img src="{{ asset('images/logo.jpg') }}" alt="Klorofil Logo">
                            </div>
                            <p class="lead">Login to your account</p>
                        </div>
                        <form method="POST" class="form-auth-small" action="{{ route('login') }}">
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
                            <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                            <div class="bottom">
                                <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="right" style="background-image: url('{{ asset("images/login-bg.jpg") }}')">
                    <div class="overlay"></div>
                    <div class="content text">
                        <h1 class="heading">Daeng Tobs Design Admin Area.</h1>
                        <p>by The Develovers.&nbsp;&nbsp;<i class="fa fa-heart text-danger"></i></p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->
@stop
