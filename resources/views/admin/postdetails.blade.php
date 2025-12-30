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
                    <h5>Post Details</h5>
                    <div class="right_content">
                        <a href="{{ route('all_post') }}">Back</a>
                    </div>
                </div>
            </div>
            <section class="blog-posts grid-system">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div class="blog-thumb" style="width: 600px">
                                    <img src="{{ asset('uploads/post/' . $post->image) }}" alt=""
                                        style="height: 550px">
                                </div>
                                <div class="down-content">
                                    <span>{{ $post->category->name }}</span>
                                    <h4>{{ $post->title }}</h4>
                                    <ul class="post-info">
                                        <li>
                                            @if ($post->user && $post->user->user_role === 'admin')
                                                Admin
                                            @elseif($post->user && $post->user->user_role === 'moderator')
                                                {{ $post->user->name }} - Moderator
                                            @elseif($post->user && $post->user->user_role === 'user')
                                                {{ $post->user->name }}
                                            @endif
                                        </li>
                                        <li>{{ $post->created_at->format('F j, Y') }}</li>
                                    </ul>
                                    <p>{{ $post->discription }} </p>
                                    <div class="post-options">
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-tags"></i></li>
                                                    <li>{{ $post->tags }}</li>
                                                </ul>
                                            </div>
                                            <div class="col-6">
                                                <ul class="post-share">
                                                    <li><i class="fa fa-share-alt"></i></li>
                                                    <li><a href="#">Facebook</a>,</li>
                                                    <li><a href="#"> Twitter</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
