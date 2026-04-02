@extends('layouts.master')
@section('title','Forget Password')
@section('content')

<div class="signUp-page signUp-minimal">
    <div class="signin-form-wrapper">
        <div class="title-area text-center">
            <h3>Recover your password</h3>
        </div> <!-- /.title-area -->
        <form id="login-form" action="{{ route('user.password.request') }}" method="POST" autocomplete="off"
            class="needs-validation">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="input-group">
                        <input type="text" name="email" id="email" value="" required autofocus>
                        <label>Email *</label>
                    </div> <!-- /.input-group -->
                </div> <!-- /.col- -->
            </div> <!-- /.row -->

            <button type="submit" class="line-button-one button-rose button_update">Submit</button>
        </form>
    </div> <!-- /.sign-up-form-wrapper -->
</div> <!-- /.signUp-page -->


@endsection