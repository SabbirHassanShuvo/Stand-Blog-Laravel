@extends('layout.master')
@section('title')
    @if (Auth::user()->hasRole('admin'))
        Stand Blog - Admin Panel
    @elseif(Auth::user()->hasRole('user'))
        Stand Blog - User Dashboard
    @else
    @endif
@endsection
@section('content')
    <style>
        .design_card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .design_card img {
            object-fit: cover;
            height: 200px;
            width: 100%;
        }

        .header_part h5 {
            display: flex;
            align-items: center;
        }

        .header_part h5 p {
            margin-left: 10px;
        }
    </style>
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
            <div class="container-lg">
                <div class="header_part">
                    <h5>Media <p class="mb-0">All({{ $imageCount }})</p>
                    </h5>
                </div>
                <div class="container mt-4">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach ($posts as $post)
                            <div class="col">
                                <div class="card design_card h-100">
                                    <img class="card-img-top img-fluid" src="{{ asset('uploads/post/' . $post->image) }}"
                                        alt="Card image cap">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <footer class="py-3 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Stand Blog</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
