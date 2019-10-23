@extends('layouts.frontend_app', [
    'breadCrumb' => 'true',
    'pageName' => 'Search Page',
    'pageTitle' => 'Search'
])

@section('frontend_content')
    <!-- product-area start -->
    <div class="product-area">
        <div class="fluid-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Search Product ({{ $count }})</h2>
                        <img src="{{ asset('frontend_assets') }}/images/section-title.png" alt="">
                    </div>
                </div>
            </div>
            <ul class="row">
                @foreach ($results as $product)
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
            </ul>
        </div>
    </div>
    <!-- product-area end -->
@endsection