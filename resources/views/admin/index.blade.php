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
            <li class="nav-item dropdown text-white">
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
            <main>
                <div class="container-fluid px-4">
                    @if (Auth::user()->hasRole('admin'))
                        <h1>Admin Dashboard</h1>
                        <!-- Admin-specific content goes here -->
                    @elseif(Auth::user()->hasRole('moderator'))
                        <h1>Moderator Dashboard</h1>
                    @elseif(Auth::user()->hasRole('user'))
                        <h1>User Dashboard</h1>
                        <!-- User-specific content goes here -->
                    @else
                    @endif
                    <div class="row">
                        @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('moderator'))
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body text-center py-4" style="font-size: 40px;">
                                        {{ $totalUsers }}
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Total user</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body text-center py-4" style="font-size: 40px;">{{ $totalPosts }}
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Total post</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body text-center py-4" style="font-size: 40px;">{{ $totalCategories }}
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Total Categories</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body text-center py-4" style="font-size: 40px;">{{ $pendingPosts }}
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Total Pendding Post</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body text-center py-4" style="font-size: 40px;">{{ $publicPosts }}
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Total Published Post</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body text-center py-4" style="font-size: 40px;">{{ $totalUserPosts }}
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Own Total Post</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body text-center py-4" style="font-size: 40px;">{{ $pendingUserPosts }}
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Own Total Pendding
                                            Post</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body text-center py-4" style="font-size: 40px;">
                                        {{ $publishedUserPosts }}
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Own Total Published
                                            Post</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (Auth::user()->hasRole('user'))
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body text-center py-4" style="font-size: 40px;">
                                        {{ $totalUserPosts }}
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Total Post</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body text-center py-4" style="font-size: 40px;">
                                        {{ $pendingUserPosts }}
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Total Pendding
                                            Post</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body text-center py-4" style="font-size: 40px;">
                                        {{ $publishedUserPosts }}
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Total Published
                                            Post</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card mb-4">
                        <table class="table align-middle mb-4 bg-white">
                            <thead class="bg-light">
                                <tr>
                                    <th>Bloger Name</th>
                                    <th>Post</th>
                                    <th>Status</th>
                                    <th>Publication</th>
                                    <th>Catagory</th>
                                    <th>Create At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (auth()->check())
                                    @if ($userPosts->isNotEmpty())
                                        @foreach ($userPosts as $post)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="ms-3">
                                                            <p class="fw-bold mb-1 text-capitalize">
                                                                {{ $post->user->name }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('post_details', $post->id) }}">
                                                        <p class="fw-normal mb-1 ellipsis"><img
                                                                src="{{ asset('uploads/post/' . $post->image) }}"
                                                                alt="image"
                                                                style="width: 50px; margin-right:5px; height: 50px;">{{ $post->title }}
                                                        </p>
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
                                                    <a href="{{ route('edit_post', $post->id) }}"><i
                                                            class="fas fa-edit"></i></a>
                                                    @if (Auth::user()->hasRole('admin'))
                                                        <a href="{{ route('delete_post', $post->id) }}"><i
                                                                class="fa-solid fa-trash"></i></a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5">Post Not Found</td>
                                        </tr>
                                    @endif
                                @endif
                            </tbody>
                        </table>
                        {{ $userPosts->links() }}
                    </div>
                </div>
            </main>
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
