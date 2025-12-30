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
            <style>
                .account-settings .user-profile {
                    margin: 0 0 1rem 0;
                    padding-bottom: 1rem;
                    text-align: center;
                }

                .account-settings .user-profile .user-avatar {
                    margin: 0 0 1rem 0;
                }

                .account-settings .user-profile .user-avatar img {
                    width: 90px;
                    height: 90px;
                    -webkit-border-radius: 100px;
                    -moz-border-radius: 100px;
                    border-radius: 100px;
                }

                .account-settings .user-profile h5.user-name {
                    margin: 0 0 0.5rem 0;
                }

                .account-settings .user-profile h6.user-email {
                    margin: 0;
                    font-size: 0.8rem;
                    font-weight: 400;
                    color: #9fa8b9;
                }

                .account-settings .about {
                    margin: 2rem 0 0 0;
                    text-align: center;
                }

                .account-settings .about h5 {
                    margin: 0 0 15px 0;
                    color: #007ae1;
                }

                .account-settings .about p {
                    font-size: 0.825rem;
                }

                .form-control {
                    border: 1px solid #cfd1d8;
                    -webkit-border-radius: 2px;
                    -moz-border-radius: 2px;
                    border-radius: 2px;
                    font-size: 0.825rem;
                    background: #ffffff;
                    color: #2e323c;
                }

                .card {
                    background: #ffffff;
                    -webkit-border-radius: 5px;
                    -moz-border-radius: 5px;
                    border-radius: 5px;
                    border: 0;
                    margin-bottom: 1rem;
                }
            </style>
            <div class="container">
                <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                                alt="Maxwell Admin" />
                                        </div>
                                        <h5 class="user-name">Yuki Hayashi</h5>
                                        <h6 class="user-email">yuki@Maxwell.com</h6>
                                    </div>
                                    <div class="about">
                                        <h5>About</h5>
                                        <p>
                                            I'm Yuki. Full Stack Designer I enjoy creating user-centric,
                                            delightful and human experiences.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mb-1 text-primary mt-2">Personal Details</h6>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group pt-3">
                                            <label for="fullName">Full Name</label>
                                            <input type="text" class="form-control" id="fullName"
                                                placeholder="Enter full name" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group pt-3">
                                            <label for="eMail">Email</label>
                                            <input type="email" class="form-control" id="eMail"
                                                placeholder="Enter email ID" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group pt-3">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone"
                                                placeholder="Enter phone number" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group pt-3">
                                            <label for="website">Website URL</label>
                                            <input type="url" class="form-control" id="website"
                                                placeholder="Website url" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mt-3 mb-2 text-primary">Address</h6>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group pt-3">
                                            <label for="Street">Street</label>
                                            <input type="name" class="form-control" id="Street"
                                                placeholder="Enter Street" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group pt-3">
                                            <label for="ciTy">City</label>
                                            <input type="name" class="form-control" id="ciTy"
                                                placeholder="Enter City" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group pt-3">
                                            <label for="sTate">State</label>
                                            <input type="text" class="form-control" id="sTate"
                                                placeholder="Enter State" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group pt-3">
                                            <label for="zIp">Zip Code</label>
                                            <input type="text" class="form-control" id="zIp"
                                                placeholder="Zip Code" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right pt-4">
                                            <button type="button" id="submit" name="submit"
                                                class="btn btn-secondary">
                                                Cancel
                                            </button>
                                            <button type="button" id="submit" name="submit"
                                                class="btn btn-primary">
                                                Update
                                            </button>
                                        </div>
                                    </div>
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
