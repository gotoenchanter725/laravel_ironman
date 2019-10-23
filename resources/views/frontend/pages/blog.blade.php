@extends('layouts.frontend_app', [
    'breadCrumb' => 'true',
    'pageName' => 'blogPost',
    'pageTitle' => 'Blog'
])

@section('frontend_content')
@include('frontend.panel.style')
<div class="blog-area">
    <div class="container">
        <div class="col-lg-12">
            <div class="section-title  text-center">
                <h2>Latest News</h2>
                <img src="{{ asset('frontend_assets') }}/images/section-title.png" alt="">
            </div>
        </div>
        <div class="row">
            @forelse ($posts as $post)
            <div class="col-lg-4  col-md-6 col-12">
                <div class="blog-wrap">
                    <div class="blog-image">
                        <img src="{{ asset('uploads/blogpost_photos') }}/{{ $post->post_image }}"
                        width="348px" height="254px" alt="">
                        <ul>
                            <li>{{ $post->created_at->format('d') }}</li>
                            <li>{{ $post->created_at->format('M') }}</li>
                        </ul>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <ul>
                                <li><a href="#"><i class="fa fa-user"></i> {{ $post->user->name }}</a></li>
                                <li class="pull-right"><a href="#"><i class="fa fa-clock-o"></i>{{ $post->created_at->format('d/m/Y') }}</a></li>
                            </ul>
                        </div>
                        <h3>
                            <a href="{{ route('blogDetails', $post) }}">{{ $post->title }}</a>
                        </h3>
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
            </div> 
            @empty
                <p>No posts found yet!!</p>
            @endforelse

            {{ $posts->links() }}
            {{-- <div class="col-12">
                <div class="pagination-wrapper text-center mb-30">
                    <ul class="page-numbers">
                        <li><a class="prev page-numbers" href="#"><i class="fa fa-arrow-left"></i>
                        </a></li>
                        <li><span class="page-numbers current">1</span></li>
                        <li><a class="page-numbers" href="#">2</a></li>
                        <li><a class="page-numbers" href="#">3</a></li>
                        <li><a class="next page-numbers" href="#"><i class="fa fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@include('frontend.panel.script')
<!-- blog-area end -->
@endsection