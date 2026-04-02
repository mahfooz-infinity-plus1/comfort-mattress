@extends('layouts.master') @section('title','Login') @section('content')


<div class="signUp-page signUp-minimal">
    <div class="signin-form-wrapper">
        <div class="title-area text-center">
            <h3>Login</h3>
        </div>
        <form id="login-form" action="{{ route('user.login') }}" method="POST" autocomplete="off" class="login">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="input-group">
                        <input type="text" name="email" value="{{ old('email') }}" required />
                        <label>Email *</label>
                    </div>
                    <!-- /.input-group -->
                </div>
                <!-- /.col- -->
                <div class="col-12">
                    <div class="input-group">
                        <input type="password" name="password" required />
                        <label>Password *</label>
                    </div>
                    <!-- /.input-group -->
                </div>
                <!-- /.col- -->
            </div>
            <!-- /.row -->
            <div class="agreement-checkbox d-flex justify-content-between align-items-center">
                <div>
                    <input type="checkbox" name="remember" {{ old("remember") ? "checked" : "" }} checked id="remember">
                    <label for="remember">Remember Me</label>
                </div>
                <a href="{{ route('user.password.request') }}">Forget Password?</a>
            </div>
            <button type="submit" class="line-button-one button-rose button_update_login">
                Login
            </button>
        </form>
        <p class="signUp-text text-center">
            Don’t have any account?
            <a href="{{ route('user.register') }}">Register</a> now
        </p>
        <p class="or-text"><span>or</span></p>
        <ul class="social-icon-wrapper row">
            <li class="col-12"><a href="{{ route('user.login.otp') }}" class="otp"><i class="fa fa-key"
                        aria-hidden="true"></i>
                    Login With OTP</a></li>
            {{-- <li class="col-12">
                <a href="{{ route('user.auth.socialite', 'google') }}" class="gmail"><i class="fa fa-envelope-o"
                        aria-hidden="true"></i>
                    Gmail</a>
            </li>
            <li class="col-12">
                <a href="{{ route('user.auth.socialite', 'facebook') }}" class="facebook"><i class="fa fa-facebook"
                        aria-hidden="true"></i>
                    Facebook</a>
            </li> --}}
        </ul>
    </div>
    <!-- /.sign-up-form-wrapper -->
</div>
<!-- /.signUp-page -->

@endsection @section('extrajs')
<script>
    $(document).ready(function() {
        $(".login").submit(function() {
            $(".button_update_login").attr("disabled", "disabled");
            $(".button_update_login").html("Please Wait");
        });
    });
</script>
@endsection