<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('img/icon.ico')  }}" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="{{ asset("js/plugin/webfont/webfont.min.js") }}"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/atlantis2.min.css") }}">
</head>
<body class="login">
<div class="wrapper wrapper-login">
    <div class="container container-login animated fadeIn">

        <h3 class="text-center">Login Admin</h3>

        <form method="POST" action="{{ route('login')}}">
            @csrf
            <div class="login-form">
                <div class="form-group form-floating-label">
                    <input id="email" name="email" type="text" class="form-control input-border-bottom @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="email" class="placeholder">{{ __('E-Mail') }}</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group form-floating-label">
                    <input id="password" name="password" type="password" class="form-control input-border-bottom @error('password') is-invalid @enderror" required autocomplete="current-password">
                    <label for="password" class="placeholder">{{ __('Password') }}</label>
                    <div class="show-password">
                        <i class="icon-eye"></i>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row form-sub m-0">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember"> {{ __('Remember Me') }}</label>
                    </div>

{{--                    @if (Route::has('password.request'))--}}
{{--                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                            {{ __('Forgot Your Password?') }}--}}
{{--                        </a>--}}
{{--                    @endif--}}
                </div>
                <div class="form-action mb-3">
                    <button class="btn btn-primary btn-rounded btn-login">Masuk</button>
                </div>
                <div class="login-account">
                    <span class="msg">Belum punya akun ?</span>
                    <a href="#" id="show-signup" class="link">Daftar</a>
                </div>
            </div>
        </form>
    </div>

    <div class="container container-signup animated fadeIn">
        <h3 class="text-center">Daftar Akun</h3>
        <div class="login-form">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group form-floating-label">
                    <input  id="name" name="name" type="text" class="form-control input-border-bottom @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <label for="name" class="placeholder">{{ __('Nama') }}</label>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group form-floating-label">
                    <input  id="email" name="email" type="email" class="form-control input-border-bottom @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                    <label for="email" class="placeholder">{{ __('E-Mail') }}</label>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group form-floating-label">
                    <input  id="password" type="password" class="form-control input-border-bottom @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <label for="password" class="placeholder">{{ __('Password') }}</label>
                    <div class="show-password">
                        <i class="icon-eye"></i>
                    </div>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group form-floating-label">
                    <input  id="password-confirm" name="password_confirmation" type="password" class="form-control input-border-bottom" required autocomplete="new-password">
                    <label for="password-confirm" class="placeholder">{{ __('Ulangi Password') }}</label>
                    <div class="show-password">
                        <i class="icon-eye"></i>
                    </div>
                </div>
                <div class="form-action">
                    <a href="#" id="show-signin" class="btn btn-danger btn-link btn-login mr-3">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Daftar') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="{{asset("js/core/jquery.3.2.1.min.js")}}"></script>
<script src="{{asset("js/core/popper.min.js")}}"></script>
<script src="{{asset("js/core/bootstrap.min.js")}}"></script>
<!-- jQuery UI -->
<script src="{{asset("js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js")}}"></script>
<!-- Atlantis JS -->
<script src="{{asset("js/atlantis.min.js")}}"></script>
</body>
</html>
