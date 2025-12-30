@extends('layout.master')
@section('title')
    Stan Blog - Forget Password
@endsection
@section('content')
    <!-- Password Reset 10 - Bootstrap Brain Component -->
    <section class="bg-light py-3 py-md-5 py-xl-8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="mb-5">
                        <div class="text-center mb-4">

                        </div>
                        <h4 class="text-center mb-4">Reset Password</h4>
                    </div>
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <form action="{{ route('processResetPassword', ['token' => $token]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <p class="text-center mb-4">Please provide a new password for your account.</p>
                                <div class="row gy-3 overflow-hidden">
                                    @error('password')
                                        <div style="color: red; font-size:16px; font-weight: 500; margin: 15px 0px 13px 0px;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">New Password</label>
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="New Password">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                id="password_confirmation" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                                        </div>
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
