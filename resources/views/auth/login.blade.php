@extends('layouts.blank-layout')
@section('content')
<div class="authentication-wrapper authentication-cover">
    <!-- Logo -->
    @include('auth.logo')
    <!-- /Logo -->
    <div class="authentication-inner row m-0">
        <!-- /Left Section -->
        <div class="d-none d-lg-flex col-lg-5 col-xl-6 align-items-center justify-content-center p-5 pb-2">
            <img src="{{ asset('assets/img/loginpage.png') }}"
                class="auth-cover-illustration w-100" alt="auth-illustration"
                data-app-light-img="{{ asset('assets/img/loginpage.png') }}"
                data-app-dark-img="{{ asset('assets/img/illustrations/auth-login-illustration-dark.png') }}" />
          
        </div>
        <!-- /Left Section -->

        <!-- Login -->
        <div
            class="d-flex col-12 col-lg-7 col-xl-6 align-items-center authentication-bg position-relative py-sm-5 px-4 py-4">
            <div class="w-px-400 mx-auto pt-5 pt-lg-0">
                <h4 class="mb-2">Welcome to {{ config('app.name') }}! 👋</h4>
                <p class="mb-4">Please sign-in to your account and start the adventure</p>

                <form id="formAuthentication" class="mb-3" action="{{ route('login.custom') }}"
                    method="post">
                    @csrf
                    <div class="form-floating form-floating-outline mb-3">
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="Enter your email or username" autofocus value="" />
                        <label for="email">Email or Username</label>
                    </div>
                    <div class="mb-3">
                        <div class="form-password-toggle">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" value="" />
                                    <label for="password">Password</label>
                                </div>
                                <!-- <span class="input-group-text cursor-pointer"><i
                                        class="mdi mdi-eye-off-outline"></i></span> -->
                            </div>
                        </div>
                    </div>
                    @if(Session::has('error')) 
                        <span style="color:red;">{{ Session::get('error') }}</span>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div style="color:red;">{{ $error }}</div>
                        @endforeach
                    @endif
                    <div class="mb-3 d-flex justify-content-between">
                        <div class="form-check">
                            <!-- <input class="form-check-input" type="checkbox" id="remember-me" />
                              <label class="form-check-label" for="remember-me"> Remember Me </label> -->
                        </div>
                        <a href="#" class="float-end mb-1">
                            <span>Forgot Password?</span>
                        </a>
                    </div>
                    <button class="btn btn-primary d-grid w-100">Sign in</button>
                </form>

                <p class="text-center mt-2">
                    <span>New on our platform?</span>
                    <a href="{{ route('register') }}"><span>Create an account</span></a>
                </p>

                <div class="divider my-4">
                    <div class="divider-text">or</div>
                </div>

                <div class="d-flex justify-content-center gap-2">
                    <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-facebook">
                        <i class="tf-icons mdi mdi-24px mdi-facebook"></i>
                    </a>

                    <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-twitter">
                        <i class="tf-icons mdi mdi-24px mdi-twitter"></i>
                    </a>

                    <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-github">
                        <i class="tf-icons mdi mdi-24px mdi-github"></i>
                    </a>

                    <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-google-plus">
                        <i class="tf-icons mdi mdi-24px mdi-google"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /Login -->
    </div>
</div>
@endsection
