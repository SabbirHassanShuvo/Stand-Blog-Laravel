@extends('layout.master')
@section('title')
    Stan Blog - Register
@endsection
@section('content')
    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div>
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form class="mx-1 mx-md-4" method="post">
                                        @csrf
                                        @error('name')
                                            <div
                                                style="color: red; font-size:16px; font-weight: 500;
    margin: 15px 0px 13px 42px;">
                                                {{ $message }}</div>
                                        @enderror
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" class="form-control"
                                                    name="name" value="{{ old('name') }}" />
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                            </div>
                                        </div>
                                        @error('email')
                                            <div
                                                style="color: red; font-size:16px; font-weight: 500;
    margin: 15px 0px 13px 42px;">
                                                {{ $message }}</div>
                                        @enderror
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" class="form-control"
                                                    name="email" value="{{ old('email') }}" />
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>
                                        @error('password')
                                            <div
                                                style="color: red; font-size:16px; font-weight: 500;
    margin: 15px 0px 13px 42px;">
                                                {{ $message }}</div>
                                        @enderror
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" class="form-control"
                                                    name="password" value="{{ old('password ') }}" />
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>
                                        </div>
                                        @error('password_confirmation')
                                            <div
                                                style="color: red; font-size:16px; font-weight: 500;
    margin: 15px 0px 13px 42px;">
                                                {{ $message }}</div>
                                        @enderror
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4cd" class="form-control"
                                                    name="password_confirmation" />
                                                <label class="form-label" for="form3Example4cd">Repeat your
                                                    password</label>
                                            </div>
                                        </div>

                                        <div class="form-check mb-3 d-flex justify-content-end">
                                            <a href="{{ url('login') }}" class="fw-bold text-dark">Click to Login</a>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-primary btn-lg">Register</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
