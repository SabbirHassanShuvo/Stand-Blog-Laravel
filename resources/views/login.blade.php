@extends('layout.master')
@section('title')
    Stan Blog - Login
@endsection
@section('content')
    <section class="bg-light py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card border border-light-subtle rounded-3 shadow-sm">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="text-center mb-3">
                                <a href="{{ route('home') }}">
                                    <h1>Stand Blog</h1>
                                </a>
                            </div>
                            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">
                                Sign in to your account
                            </h2>
                            @if (session('error'))
                                <div
                                    style="color: white;padding: 11px 29px;background: rgb(233, 13, 13);font-weight: 600;border-radius: 5px;margin-bottom: 20px;">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('success'))
                                <div
                                    style="color: white;padding: 11px 29px;background: green;font-weight: 600;border-radius: 5px;margin-bottom: 20px;">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('user_login') }}" method="POST">
                                @csrf
                                <div class="row">
                                    @error('email')
                                        <div
                                            style="color: red; font-size:16px; font-weight: 500;
    margin: 15px 0px 13px 0px;">
                                            {{ $message }}</div>
                                    @enderror
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="name@example.com" value="{{ old('email') }}" />
                                        </div>
                                    </div>
                                    @error('password')
                                        <div
                                            style="color: red; font-size:16px; font-weight: 500;
    margin: 15px 0px 13px 0px;">
                                            {{ $message }}</div>
                                    @enderror
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" id="password"
                                                value="" placeholder="Password" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex gap-2 justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="rememberMe" id="rememberMe" />
                                                <label class="form-check-label text-secondary" for="rememberMe">
                                                    Keep me logged in
                                                </label>
                                            </div>
                                            <a href="{{ url('forgetpassword') }}"
                                                class="link-primary text-decoration-none">Forgot
                                                password?</a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid my-3">
                                            <button class="btn btn-primary btn-lg" type="submit">
                                                Log in
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="m-0 text-secondary text-center">
                                            Don't have an account?
                                            <a href="{{ url('register') }}" class="link-primary text-decoration-none">Sign
                                                up</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
