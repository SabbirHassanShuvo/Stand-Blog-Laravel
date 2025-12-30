@extends('layout.base')
@section('title')
    Stand Blog - Post Details
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
                            <h4>Post Details</h4>
                            <h2>{{ $post->title }}</h2>
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
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="{{ asset('uploads/post/' . $post->image) }}" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span>{{ $post->category->name }}</span>
                                        <a href="post-details.html">
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
                                        </ul>
                                        <p>{{ $post->discription }}
                                        </p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-tags"></i></li>
                                                        <li><a href="#">{{ $post->tags }}</a></li>
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
                            <div class="col-lg-12">
                                <div class="sidebar-item comments">
                                    <div class="sidebar-heading">
                                        <h2>comments</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach ($post->comments as $comment)
                                                <li style="width: 100%;">
                                                    <div class="author-thumb">
                                                        <img src="{{ asset('uploads/comment.jpg') }}"
                                                            alt="Default Profile Banner">
                                                    </div>
                                                    <div class="right-content">
                                                        <h4>{{ $comment->user->name }}
                                                            <span>{{ $comment->created_at->format('M d, Y') }}</span>
                                                        </h4>
                                                        <p>{{ $comment->comment }}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @if (auth()->check())
                                <div class="col-lg-12">
                                    <div class="sidebar-item submit-comment">
                                        <div class="sidebar-heading">
                                            <h2>Your comment</h2>
                                        </div>
                                        <div class="content">
                                            <form id="comment"
                                                action="{{ route('comment_submit', ['id' => $post->id]) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="blog_id" value="{{ $post->id }}">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        @error('comment')
                                                            <div
                                                                style="color: red; font-size: 16px; font-weight: 500; margin: 10px 0;">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <fieldset>
                                                            <textarea class=" @error('discription') is-invalid @enderror" name="comment" rows="6" id="message"
                                                                placeholder="Type your comment">{{ old('comment') }}</textarea>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <fieldset>
                                                            <button type="submit" id="form-submit"
                                                                class="main-button">Submit</button>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            @endif
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
                                                        <a href="post-details.html">
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
        </div>
    </section>


    @include('include/footer')
@endsection
