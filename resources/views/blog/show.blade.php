@extends('layouts.dashboard_app', ['activePage' => 'blogpost', 'titlePage' => __('Single blogpost')])

@section('breadcrub_content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
    <span class="breadcrumb-item active">BlogPost</span>
</nav>
@endsection

@section('dashboard_content')
<!-- blog-details-area start-->
@include('frontend.panel.style')
<div class="blog-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="blog-details-wrap">
                    <img src="{{ asset('uploads/blogpost_photos') }}/{{ $post->post_image }}" width="870px" height="500px" alt="">
                    <h3>{{ $post->title }}</h3>
                    <ul class="meta">
                        <li>{{ $post->created_at->format('d M Y') }}</li>
                        <li>{{ $post->user->name }}</li>
                    </ul>
                    <p>{{ $post->content }}</p>
                    @auth
                    <div class="col-sm-7 m-2">
                        <a class="btn btn-info" href="{{ route('posts.edit', $post) }}">Edit</a>
                        <a class="btn btn-danger" href="" onclick="confirm('Are you sure want to delete?') ? document.querySelector('post-delete').submit(): ''">
                        Delete
                        </a>
                        <form id='post-delete' action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                    @endauth
                    <div class="share-wrap">
                        <div class="row">
                            <div class="col-sm-7 ">
                                <ul class="socil-icon d-flex">
                                    <li>share it on :</li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <div class="col-sm-5 text-right">
                                <a href="{{ route('posts.show', $post->id + 1) }}">Next Post <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-form-area">
                    <div class="comment-main">
                        <h3 class="blog-title"><span>({{ $post->comments_count }}) </span>Comments:</h3>
                        <ol class="comments">
                            <li class="comment even thread-even depth-1">
                                @forelse ($post->comments as $comment)
                                <div class="comment-wrap">
                                    <div class="comment-theme">
                                        <div class="comment-image">
                                            <img src="{{ asset('uploads/profile_photos') }}/{{ $comment->user->profile_image }}" width="128px" height="128px" alt="Jhon">
                                        </div>
                                    </div>
                                    <div class="comment-main-area">
                                        <div class="comment-wrapper">
                                            <div class="sewl-comments-meta">
                                                <h4>{{ $comment->user->name }}</h4>
                                                <span>{{ $comment->created_at->format('d M y') }} at {{ $comment->created_at->format('h:i') }}</span>
                                            </div>
                                            <div class="comment-area">
                                                <p>{{ $comment->commenter_message }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    <p>No comments yet!!</p>
                                @endforelse

                            </li>
                        </ol>
                    </div>
                    @auth
                    <div id="respond" class="sewl-comment-form comment-respond form-style">
                        <h3 id="reply-title" class="blog-title">Leave a <span>comment</span></h3>
                        <x-alert :type="session('type')" :message="session('status')"/>
                        <form novalidate="" method="post" id="commentform" class="comment-form" action="{{ route('comments.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="sewl-form-inputs no-padding-left">
                                        <div class="row">
                                            <div class="col-sm-6 col-12">
                                                <input id="name" name="name" value="{{ Auth::user()->name }}" tabindex="2" placeholder="Name" type="text">
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <input id="email" name="email" value="{{ Auth::user()->email }}" tabindex="3" placeholder="Email" type="email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="sewl-form-textarea no-padding-right">
                                        <textarea id="comment" name="commenter_message" tabindex="4" rows="3" cols="30" placeholder="Write Your Comments...">{{ old('commenter_message') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-submit">
                                        <input name="submit" id="submit" value="Send" type="submit">
                                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                        <input name="blog_post_id" value="{{ $post->id }}" id="blog_post_id" type="hidden">
                                        <input name="comment_parent" id="comment_parent" value="0" type="hidden">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endauth
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <aside class="sidebar-area">
                    <div class="widget widget_categories">
                        <h4 class="widget-title">Categories</h4>
                        <ul>
                            @forelse ($categorys as $category)
                                <li><a href="#">{{ $category->categoryname }}</a></li>
                            @empty
                                <li><a href="">No Category Found!!</a></li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="widget widget_recent_entries recent_post">
                        <h4 class="widget-title">Recent Post</h4>
                        <ul>
                            @forelse ($recent_posts as $recent_post)
                            <li>
                                <div class="post-img">
                                    <img src="{{ asset('uploads/blogpost_photos') }}/{{ $recent_post->post_image }}" alt="" width="70px" height="60px">
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('posts.show', ['post' => $recent_post->id]) }}">
                                        {{  Str::limit($recent_post->title,50) }}
                                    </a>
                                    <p>{{ $recent_post->created_at->format('d M y') }}</p>
                                </div>
                            </li>
                            @empty
                                <p>No blog post yet!!!</p>
                            @endforelse
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
@include('frontend.panel.script')
<!-- blog-details-area end -->
@endsection



