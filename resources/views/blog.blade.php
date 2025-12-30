@extends('layout.base')
@section('title')
    Stand Blog - about
@endsection
@section('content')
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    @include('include.header')

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Recent Posts</h4>
                            <h2>Our Recent Blog Entries</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Banner Ends Here -->

    @include('include.seemore')


    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            @foreach ($posts as $post)
                                <div class="col-lg-6">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <img src="{{ asset('uploads/post/' . $post->image) }}" alt=""
                                                style="height: 350px;">
                                        </div>
                                        <div class="down-content">
                                            <span>{{ $post->category->name }}</span>
                                            <a
                                                href="{{ route('postDeatails', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                                <h4>{{ $post->title }}</h4>
                                            </a>
                                            <ul class="post-info">
                                                <li><a href="#">
                                                        @if ($post->user && $post->user->user_role === 'admin')
                                                            Admin
                                                        @elseif($post->user && $post->user->user_role === 'moderator')
                                                            {{ $post->user->name }} - Moderator
                                                        @elseif($post->user && $post->user->user_role === 'user')
                                                            {{ $post->user->name }}
                                                        @endif
                                                    </a></li>
                                                <li><a href="#">{{ $post->created_at->format('F j, Y') }}</a></li>
                                                <li><a href="#">12 Comments</a></li>
                                            </ul>
                                            <p class="ellipsis">
                                                {{ $post->discription }}
                                            </p>
                                            <div class="post-options">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-tags"></i></li>
                                                            <li><a href="#">{{ $post->tags }}</a>,</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-lg-12">
                                {{ $posts->links('vendor.pagination.custom') }}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sidebar-item search">
                                    <form id="search_form" name="gs" method="GET" action="#">
                                        <input type="text" name="q" class="searchText"
                                            placeholder="type to search..." autocomplete="on">
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item recent-posts">
                                    <div class="sidebar-heading">
                                        <h2>Recent Posts</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach ($posts as $post)
                                                @if ($post->publish === 'yes' && $post->status === 'active')
                                                    <li>
                                                        <a
                                                            href="{{ route('postDeatails', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                                            <h5>
                                                                {{ $post->title }}
                                                            </h5>
                                                            <span>{{ $post->created_at->format('F j, Y') }}</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item categories">
                                    <div class="sidebar-heading">
                                        <h2>Categories</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach ($category as $cate)
                                                @if ($cate->status === 'active')
                                                    <li>
                                                        <a href="{{ route('filtercategory', $cate->id) }}">-
                                                            {{ $cate->name }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item tags">
                                    <div class="sidebar-heading">
                                        <h2>Tag Clouds</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach ($posts as $post)
                                                @if ($post->publish === 'yes' && $post->status === 'active')
                                                    <li>
                                                        <a href="#">{{ $post->tags }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('include/footer')
        </div>
    </section>
@endsection
