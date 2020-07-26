@extends("auth.layout", [
    "title" => "Silahkan Login"
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
                            <p class="lead" style="margin-top: 2rem;">Form Login</p>
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
                            <button type="submit" class="btn btn-primary btn-lg btn-block">MASUK</button>
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
                        <p>Anda harus login terlebih dahulu sebelum melakukan transaksi.
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@stop
