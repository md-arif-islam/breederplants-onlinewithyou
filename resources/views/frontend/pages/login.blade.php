@extends('frontend.layouts.app')
@section('title', 'Login')
@section('content')
    <main class="main">
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto">
                        <div class="row">
                            <!-- logo -->
                            <div class="aside-top text-center">
                                <a href="#" class="brand-wrap">
                                    <img src="{{ asset('assets/frontend/imgs/theme/logo.png') }}" class="logo" alt="Evara Dashboard">
                                </a>
                            </div>
                            <div class="heading_s1 my-5">
                                <h2 style="color: #292D32; font-size: 22px;">Welcome User!</h2>
                                <p class="mt-3" style="color: #5F5F5F;">Enter your Email address and Password and enjoy our app</p>
                            </div>
                            <div class="col-lg-12 mt-5">
                                <div class="login_wrap widget-taber-content background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                    <div class="padding_eight_all bg-white">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" required name="email" placeholder="Your Email" class="form-control @error('email') is-invalid @enderror">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input required type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
{{--                                            <div class="login_footer form-group">--}}
{{--                                                <a style="color: #50C878;" href="">Forgot password?</a>--}}
{{--                                            </div>--}}
                                            <div class="form-group submit hover-up">
                                                <button type="submit" class="btn btn-fill-out btn-block " name="login">Log in</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
