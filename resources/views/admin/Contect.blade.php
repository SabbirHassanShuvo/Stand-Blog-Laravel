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
                    <h5><a href="{{ route('contect_show') }}">Contact Manage</a>
                    </h5>
                    <div class="right_content">
                        <form action="{{ route('contect_filter') }}" method="POST"
                            class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                            @csrf
                            <div class="input-group">
                                <div class="search-bar">
                                    <input type="text" placeholder="Search Comment...." name="search_data">
                                    <button type="submit"><i class="fas fa-search search-icon"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table align-middle mb-4 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Author</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Create At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (auth()->check())
                            @if ($posts->isNotEmpty())
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1 text-capitalize">{{ $post->name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1">{{ $post->email }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1 ellipsis">{{ $post->message }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1">{{ $post->created_at->format('d/m/Y') }}</p>
                                        </td>
                                        <td class="edit_delete">
                                            <a href="{{ route('contect_reply', $post->id) }}">
                                                <i class="fa-solid fa-reply"></i>
                                            </a>

                                            <button type="button" class="btn btn-link p-0 text-danger btn-delete"
                                                data-url="{{ route('contact_delete', $post->id) }}"
                                                data-name="{{ $post->email ?? 'this message' }}" data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">Comments Not Found</td>
                                </tr>
                            @endif
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
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p id="deleteMessage">Are you sure you want to delete this contact message?</p>
            </div>

            <form id="deleteForm" method="POST">
                @csrf
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        No
                    </button>
                    <button type="submit" class="btn btn-danger">
                        Yes, delete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        const deleteForm = document.getElementById('deleteForm');
        const msg = document.getElementById('deleteMessage');

        deleteButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                deleteForm.action = this.getAttribute('data-url');
                msg.textContent = 'Are you sure you want to delete this contact message?';
            });
        });
    });
</script>
