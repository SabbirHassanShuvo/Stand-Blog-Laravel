@extends('layout.master')
@section('title')
    Stan Blog - Admin Panel
@endsection
@section('content')
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('home') }}">Stand Blog</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('porfile') }}">{{ Auth::user()->name }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('porfile') }}">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        @include('include/dashboradsidebar')
        <div id="layoutSidenav_content">
            <section class="h-100 gradient-custom-2">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center">
                        <div class="col col-lg-9 col-xl-8">
                            <div class="card">
                                <div class="rounded-top text-white d-flex flex-row"
                                    style="background-color: #000; height: 200px">
                                    <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px">
                                        @if ($user->profile && $user->profile->profile_banner === '')
                                            <img src="{{ asset('images/profile.jpg') }}" alt="Generic placeholder image"
                                                class="img-fluid img-thumbnail mt-4 mb-2"
                                                style="width: 150px; z-index: 1" />
                                        @elseif ($user->profile && $user->profile->profile_banner)
                                            <img src="{{ asset('uploads/profile/' . $user->profile->profile_banner) }}"
                                                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                                style="width: 150px; z-index: 1" />
                                        @else
                                            <img src="{{ asset('images/profile.jpg') }}" alt="Default image"
                                                class="img-fluid img-thumbnail mt-4 mb-2"
                                                style="width: 150px; z-index: 1" />
                                        @endif
                                    </div>
                                    <div class="ms-3" style="margin-top: 130px">
                                        <h5>{{ $user->name }}</h5>
                                        <p>{{ $user->email }}</p>
                                    </div>
                                </div>
                                <div class="card-body p-4 text-black">
                                    <div class="d-flex justify-content-between align-items-center mb-4 text-body">
                                        <p class="lead fw-normal mb-0"></p>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-xl">
                                            <div class="card mb-4">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h5 class="mb-6 pt-6 pb-6">Update Profile Infroamtion</h5>
                                                    <small class="text-muted float-end"></small>
                                                </div>
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
                                                <div class="card-body">
                                                    <form action="{{ route('update_profile', $user->id) }}" method="POST">
                                                        @csrf
                                                        <div class="mb-3">
                                                            @error('Email')
                                                                <div
                                                                    style="color: red; font-size:16px; font-weight: 500;
    margin: 10px 0px 10px 0px;">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                            <div class="mb-3 mt-0">
                                                                <label class="form-label" for="basic-default-fullname">Enter
                                                                    Email</label>
                                                                <input type="text"
                                                                    class="form-control @error('Email')
                                                is-invalid
                                            @enderror"
                                                                    id="basic-default-fullname" name="Email"
                                                                    value="{{ $user->email }}" disabled />
                                                            </div>

                                                        </div>
                                                        <div class="mb-3">
                                                            @error('username')
                                                                <div
                                                                    style="color: red; font-size:16px; font-weight: 500;
    margin: 10px 0px 10px 0px;">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                            <div class="mb-3 mt-0">
                                                                <label class="form-label" for="basic-default-fullname">Enter
                                                                    Username</label>
                                                                <input type="text"
                                                                    class="form-control @error('username')
                                                is-invalid
                                            @enderror"
                                                                    id="basic-default-fullname" name="username"
                                                                    value="{{ $user->name }}" />
                                                            </div>

                                                        </div>
                                                        <div class="mb-3">
                                                            @error('password')
                                                                <div
                                                                    style="color: red; font-size:16px; font-weight: 500;
    margin: 10px 0px 10px 0px;">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                            <div class="mb-3 mt-0">
                                                                <label class="form-label" for="basic-default-fullname">Enter
                                                                    Password</label>
                                                                <input type="password"
                                                                    class="form-control @error('password')
                                                is-invalid
                                            @enderror"
                                                                    id="basic-default-fullname" name="password"
                                                                    value="{{ old('password') }}" />
                                                            </div>

                                                        </div>
                                                        <button type="submit" class="btn btn-primary mb-2 mt-3">Update
                                                            Profile</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-xl">
                                            <div class="card mb-4">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h5 class="mb-6 pt-6 pb-6">Update Profile Image</h5>
                                                    <small class="text-muted float-end"></small>
                                                </div>
                                                @if (session('error'))
                                                    <div
                                                        style="color: white;padding: 11px 29px;background: rgb(233, 13, 13);font-weight: 600;border-radius: 5px;margin-bottom: 20px;">
                                                        {{ session('error') }}
                                                    </div>
                                                @endif
                                                @if (session('done'))
                                                    <div
                                                        style="color: white;padding: 11px 29px;background: green;font-weight: 600;border-radius: 5px;margin-bottom: 20px;">
                                                        {{ session('done') }}
                                                    </div>
                                                @endif
                                                <div class="card-body">
                                                    <form action="{{ route('profilepic_update', $user->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf

                                                        <!-- Banner Image Upload -->
                                                        <div class="mb-3">
                                                            <label class="form-label" for="banner_image">Profile Banner
                                                                Image</label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="file" id="banner_image"
                                                                    class="form-control @error('banner_image') is-invalid @enderror"
                                                                    name="banner_image" />
                                                            </div>
                                                            @error('banner_image')
                                                                <div
                                                                    style="color: red; font-size:16px; font-weight: 500; margin: 10px 0px;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <!-- Submit Button -->
                                                        <button type="submit" class="btn btn-primary mb-2 mt-3">Update
                                                            Profile Image</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Stand Blog</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
