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
                    <h5>Creat Post</h5>
                    <div class="right_content">
                        <a href="{{ route('all_post') }}">Back</a>
                    </div>
                </div>
            </div>
            <div class="addUser_content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-6 pt-6 pb-6">Create Post</h5>
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
                                    <form action="{{ route('create_post') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @error('title')
                                            <div
                                                style="color: red; font-size:16px; font-weight: 500;
    margin: 10px 0px 10px 0px;">
                                                {{ $message }}</div>
                                        @enderror
                                        <div class="mb-3 mt-0">
                                            <label class="form-label" for="basic-default-fullname">Post Title</label>
                                            <input type="text"
                                                class="form-control @error('title')
                                                is-invalid
                                            @enderror"
                                                id="basic-default-fullname" name="title" value="{{ old('title') }}" />
                                        </div>
                                        @error('tags')
                                            <div
                                                style="color: red; font-size:16px; font-weight: 500;
    margin: 10px 0px 10px 0px;">
                                                {{ $message }}</div>
                                        @enderror
                                        <div class="mb-3 mt-0">
                                            <label class="form-label" for="basic-default-fullname">Post Tags</label>
                                            <input type="text"
                                                class="form-control @error('tags')
                                                is-invalid
                                            @enderror"
                                                id="basic-default-fullname" name="tags" value="{{ old('tags') }}" />
                                        </div>

                                        <div class="mb-3">
                                            @error('image')
                                                <div style="color: red; font-size:16px; font-weight: 500; margin: 10px 0;">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            <label class="form-label" for="postImage">Post Image</label>
                                            <div class="input-group input-group-merge">
                                                <input type="file" id="postImage"
                                                    class="form-control @error('image') is-invalid @enderror" name="image"
                                                    accept="image/*" />
                                            </div>

                                            <!-- Preview Container -->
                                            <div class="mt-2" id="imagePreviewContainer" style="display: none;">
                                                <p id="previewLabel">Selected Image Preview:</p>
                                                <img id="imagePreview" src="" alt="Preview"
                                                    style="max-width: 200px; max-height: 200px; border: 1px solid #ddd; padding: 3px;" />
                                            </div>

                                            <!-- Current Image (Edit Only) -->
                                            @if (isset($post) && $post->image)
                                                <div class="mt-2" id="currentImageContainer">
                                                    <p>Current Image:</p>
                                                    <img src="{{ asset('uploads/post/' . $post->image) }}"
                                                        alt="Current Image"
                                                        style="max-width: 200px; max-height: 200px; border: 1px solid #ddd; padding: 3px;" />
                                                </div>
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            @error('status')
                                                <div
                                                    style="color: red; font-size:16px; font-weight: 500;
    margin: 10px 0px 10px 0px;">
                                                    {{ $message }}</div>
                                            @enderror

                                            <label for="exampleFormControlSelect1" class="form-label">Post
                                                Status</label>
                                            <select
                                                class="form-select @error('status')
                                                is-invalid
                                            @enderror"
                                                id="exampleFormControlSelect1" aria-label="Default select example"
                                                name="status">
                                                <option selected>Select Post Status</option>
                                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="nonactive"
                                                    {{ old('status') == 'nonactive' ? 'selected' : '' }}>
                                                    Non Active</option>
                                            </select>
                                        </div>
                                        @if (!Auth::user()->hasRole('user'))
                                            <div class="mb-3">
                                                @error('publish')
                                                    <div
                                                        style="color: red; font-size:16px; font-weight: 500; margin: 10px 0px 10px 0px;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                                <label for="exampleFormControlSelect1" class="form-label">Post
                                                    Publish</label>
                                                <select class="form-select @error('publish') is-invalid @enderror"
                                                    id="exampleFormControlSelect1" aria-label="Default select example"
                                                    name="publish">
                                                    <option selected>Select Post Publication</option>
                                                    <option value="yes"
                                                        {{ old('publish') == 'yes' ? 'selected' : '' }}>Yes</option>
                                                    <option value="no" {{ old('publish') == 'no' ? 'selected' : '' }}>
                                                        No</option>
                                                </select>
                                            </div>
                                        @endif
                                        <div class="mb-3">
                                            @error('category')
                                                <div style="color: red; font-size:16px; font-weight: 500; margin: 10px 0;">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            <label for="category" class="form-label">Post Category</label>
                                            <select class="form-select @error('category') is-invalid @enderror"
                                                id="category" name="category" aria-label="Default select example">
                                                <option value="">Select a category</option>
                                                <!-- Optional placeholder -->
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3 mt-0">
                                            @error('discription')
                                                <div style="color: red; font-size: 16px; font-weight: 500; margin: 10px 0;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label class="form-label" for="description">Post Description</label>
                                            <textarea class="form-control @error('discription') is-invalid @enderror" id="description" name="discription"
                                                rows="5" placeholder="Enter post description">{{ old('discription') }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2 mt-3">Create Post</button>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const postImageInput = document.getElementById('postImage');
        const previewContainer = document.getElementById('imagePreviewContainer');
        const previewImg = document.getElementById('imagePreview');

        postImageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewContainer.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                previewImg.src = '';
                previewContainer.style.display = 'none';
            }
        });
    });
</script>
