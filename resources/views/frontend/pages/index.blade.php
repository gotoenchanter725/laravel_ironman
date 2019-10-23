@extends('layouts.frontend_app', [
    'breadCrumb' => 'false',
    'pageName' => 'Home Page',
    'pageTitle' => 'Home'
])

@section('frontend_content')
    <!-- slider-area start -->
    @include('frontend.panel.slider_area')
    <!-- slider-area end -->

    <!-- featured-area start -->
    <div class="featured-area featured-area2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="featured-active2 owl-carousel next-prev-style">
                        @foreach ($categories as $category)
                        <div class="featured-wrap">
                            <div class="featured-img">
                                <img src="{{ asset('uploads/category_photos') }}/{{ $category->categoryimage }}" alt="">
                                <div class="featured-content">
                                    <a href="{{ route('shop') }}">{{ $category->categoryname }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured-area end -->

    <!-- start count-down-section -->
    <div class="count-down-area count-down-area-sub">
        <section class="count-down-section section-padding parallax" data-speed="7">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12 text-center">
                        <h2 class="big">Deal Of the Day <span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</span></h2>
                    </div>
                    <div class="col-12 col-lg-12 text-center">
                        <div class="count-down-clock text-center">
                            <div id="clock">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
    </div>
    <!-- end count-down-section -->

    <!-- product-area start -->
    <div class="product-area product-area-2">
        <div class="fluid-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Best Seller</h2>
                        <img src="{{ asset('frontend_assets') }}/images/section-title.png" alt="">
                    </div>
                </div>
            </div>
            <ul class="row">
                @foreach ($best_sellers as $best_seller)
                <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="product-wrap">
                        <div class="product-img">
                            <img src="{{ asset('uploads/product_photos') }}/{{ App\Product::find($best_seller->product_id)->product_image }}" alt="">
                            <div class="product-icon flex-style">
                                <ul>
                                    <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                    <li>
                                        {{-- <form action="{{ route('wishlist.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <a href="#" onclick="event.preventDefault();
                                        this.parentElement.submit()"><i class="fa fa-heart"></i></a>
                                        </form> --}}
                                    </li>
                                    <li>
                                        {{-- <form action="{{ route('cart.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" value="1" name="product_quantity"/>
                                        <a href="#" onclick="event.preventDefault();
                                        this.parentElement.submit()"><i class="fa fa-shopping-bag"></i></a>
                                        </form> --}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('singleproduct', ['slug' => App\Product::find($best_seller->product_id)->slug]) }}">{{ App\Product::find($best_seller->product_id)->product_name }}</a></h3>
                            <p class="pull-left">${{ App\Product::find($best_seller->product_id)->product_price }}</p>
                                {{-- <ul class="pull-right d-flex">
                                    @for ($i = 0; $i <average_stars(App\Product::find($best_seller->product_id)); $i++)
                                        <li><i class="fa fa-star"></i></li>
                                    @endfor
                                </ul> --}}
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- product-area end -->

    <!-- product-area start -->
    <div class="product-area">
        <div class="fluid-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Our Latest Product</h2>
                        <img src="{{ asset('frontend_assets') }}/images/section-title.png" alt="">
                    </div>
                </div>
            </div>
            <ul class="row">
                @foreach ($products as $product)
                <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="product-wrap">
                        <div class="product-img">
                            <span>Sale</span>
                            <img src="{{ asset('uploads/product_photos') }}/{{ $product->product_image }}" alt="">
                            <div class="product-icon flex-style">
                                <ul>
                                    <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                    <li>
                                        <form action="{{ route('wishlist.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <a href="#" onclick="event.preventDefault();
                                            this.parentElement.submit()"><i class="fa fa-heart"></i></a>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ route('cart.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" value="1" name="product_quantity"/>
                                            <a href="#" onclick="event.preventDefault();
                                            this.parentElement.submit()"><i class="fa fa-shopping-bag"></i></a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('singleproduct', ['slug' => $product->slug]) }}">{{ $product->product_name }}</a></h3>
                            <p class="pull-left">BDT: {{ $product->product_price }} </p>
                            <ul class="pull-right d-flex">
                                @for ($i = 0; $i < average_stars($product->id); $i++)    
                                <li><i class="fa fa-star"></i></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </li>
                @endforeach
                @foreach($products as $product)
                @if($loop->index>8)
                <li class="col-xl-3 col-lg-4 col-sm-6 col-12  moreload">
                    <div class="product-wrap">
                        <div class="product-img">
                            <span>Sale</span>
                            <img src="{{ asset('uploads/product_photos') }}/{{ $product->product_image }}" alt="">
                            <div class="product-icon flex-style">
                                <ul>
                                    <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                    <li>
                                        <form action="{{ route('wishlist.store') }}" method="post">
                                        @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <a href="#" onclick="event.preventDefault();
                                            this.parentElement.submit()"><i class="fa fa-heart"></i></a>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ route('cart.store') }}" method="post">
                                            @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" value="1" name="product_quantity"/>
                                                <a href="#" onclick="event.preventDefault();
                                                this.parentElement.submit()"><i class="fa fa-shopping-bag"></i></a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('singleproduct', ['slug' => $product->slug]) }}">{{ $product->product_name }}</a></h3>
                            <p class="pull-left">BDT: {{ $product->product_price }} </p>
                                {{-- <ul class="pull-right d-flex">
                                    @for ($i = 0; $i <average_stars($product->id); $i++)
                                        <li><i class="fa fa-star"></i></li>
                                    @endfor
                                </ul> --}}
                        </div>
                    </div>
                </li>
                @endif
                @endforeach
                <li class="col-12 text-center">
                    <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- product-area end -->

    <!-- testmonial-area start -->
    <div class="testmonial-area testmonial-area2 black-opacity"
    style="background: url({{ asset('uploads/category_photos') }}/2.jpg) no-repeat center center / cover"
    >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="test-title text-center">
                        <h2>What Our client Says</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 col-12">
                    <div class="testmonial-active owl-carousel">
                        @foreach ($testimonials as $testimonial)
                        <div class="test-items test-items2">
                            <div class="test-content">
                                <p>{{ $testimonial->client_message }}</p>
                                <h2>{{ $testimonial->client_name }}</h2>
                                <p>{{ $testimonial->client_position }}</p>
                            </div>
                            <div class="test-img2">
                                <img src="{{ asset('uploads/client_photos') }}/{{ $testimonial->client_image }}" alt="">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testmonial-area end -->
@endsection