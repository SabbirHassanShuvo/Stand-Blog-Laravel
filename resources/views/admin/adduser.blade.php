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
                    <li><a class="dropdown-item" href="{{route('porfile')}}">{{ Auth::user()->name }}</a></li>
                    <li><a class="dropdown-item" href="{{route('porfile')}}">Settings</a></li>
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
            <div class="container-lg">
                <div class="header_part">
                    <h5>Creat New User</h5>
                    <div class="right_content">
                        <a href="{{ route('all_user') }}">Back</a>
                    </div>
                </div>
            </div>
            <div class="addUser_content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-6 pt-6 pb-6">Create New User</h5>
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
                                    <form action="{{ route('Creat_User') }}" method="POST">
                                        @csrf
                                        @error('name')
                                            <div
                                                style="color: red; font-size:16px; font-weight: 500;
    margin: 10px 0px 10px 0px;">
                                                {{ $message }}</div>
                                        @enderror
                                        <div class="mb-3 mt-0">
                                            <label class="form-label" for="basic-default-fullname">Enter Name</label>
                                            <input type="text"
                                                class="form-control @error('name')
                                                is-invalid
                                            @enderror"
                                                id="basic-default-fullname" name="name" value="{{ old('name') }}" />
                                        </div>
                                        <div class="mb-3">
                                            @error('email')
                                                <div
                                                    style="color: red; font-size:16px; font-weight: 500;
    margin: 10px 0px 10px 0px;">
                                                    {{ $message }}</div>
                                            @enderror
                                            <label class="form-label" for="basic-default-email">Enter Email Address</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="basic-default-email"
                                                    class="form-control @error('email')
                                                is-invalid
                                            @enderror"
                                                    name="email" value="{{ old('email') }}" />
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            @error('user_role')
                                                <div
                                                    style="color: red; font-size:16px; font-weight: 500;
    margin: 10px 0px 10px 0px;">
                                                    {{ $message }}</div>
                                            @enderror

                                            <label for="exampleFormControlSelect1" class="form-label">User
                                                Permission</label>
                                            <select
                                                class="form-select @error('user_role')
                                                is-invalid
                                            @enderror"
                                                id="exampleFormControlSelect1" aria-label="Default select example"
                                                name="user_role">
                                                <option selected disabled>Select User Role</option>
                                                <option value="admin" {{ old('user_role') == 'admin' ? 'selected' : '' }}>
                                                    Admin</option>
                                                <option value="moderator"
                                                    {{ old('user_role') == 'moderator' ? 'selected' : '' }}>Moderator
                                                </option>
                                                <option value="user" {{ old('user_role') == 'user' ? 'selected' : '' }}>
                                                    User</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2 mt-3">Create User</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
