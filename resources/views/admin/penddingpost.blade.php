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
                    <h5><a href="{{ route('pendding_post') }}">Pendding Post</a>
                    </h5>
                    <div class="right_content">
                        <form action="{{ route('pendding_filter') }}" method="POST" enctype="multipart/form-data"
                            class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                            @csrf
                            <div class="input-group">
                                <div class="search-bar">
                                    <input type="text" placeholder="Search post...." name="search_data">
                                    <button type="submit"><i class="fas fa-search search-icon"></i></button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <table class="table align-middle mb-4 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Bloger Name</th>
                            <th>Post</th>
                            <th>Status</th>
                            <th>Published</th>
                            <th>Catagory</th>
                            <th>Create At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($posts->isNotEmpty())
                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1 text-capitalize">{{ $post->user->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('post_details', $post->id) }}">
                                            <p class="fw-normal mb-1 ellipsis"><img
                                                    src="{{ asset('uploads/post/' . $post->image) }}" alt="image"
                                                    style="width: 50px; margin-right:5px;">{{ $post->title }}</p>
                                        </a>
                                    </td>
                                    <td>
                                        @if ($post->status === 'active')
                                            <strong>Active</strong>
                                        @elseif($post->status === 'deactive')
                                            <strong>Deactive</strong>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->publish === 'yes')
                                            <strong>Yes</strong>
                                        @elseif($post->publish === 'no')
                                            <strong>No</strong>
                                        @endif
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $post->category->name }}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $post->created_at->format('d/m/Y') }}</p>
                                    </td>
                                    <td class="edit_delete">
                                        <a href="{{ route('edit_panding', $post->id) }}"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">User Not Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $posts->links() }}
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
