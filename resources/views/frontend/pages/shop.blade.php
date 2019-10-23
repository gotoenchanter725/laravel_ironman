@extends('layouts.frontend_app', [
    'breadCrumb' => 'true',
    'pageName' => 'Shop Page',
    'pageTitle' => 'Shop'
])

@section('frontend_content')
<!-- product-area start -->
<div class="product-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="product-menu">
                    <ul class="nav justify-content-center">
                        <li>
                            <a class="active" data-toggle="tab" href="#all">All product</a>
                        </li>
                        @foreach ($categorys as $category)
                        <li>
                            <a data-toggle="tab" href="#category_id_{{ $category->id }}">{{ $category->categoryname }}</a>
                        </li>    
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="all">
                <ul class="row">
                    @foreach ($products as $single_product)
                    <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="product-wrap">
                            <div class="product-img">
                                <span>Sale</span>
                                <img src="{{ asset('uploads/product_photos') }}/{{$single_product->product_image}}" alt="">
                                <div class="product-icon flex-style">
                                    <ul>
                                        <li>
                                            <a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a>
                                        </li>
                                        <li>
                                            <form action="{{ route('wishlist.store') }}" method="post">
                                            @csrf
                                                <input type="hidden" name="product_id" value="{{ $single_product->id }}">
                                                <a href="#" onclick="event.preventDefault();
                                                this.parentElement.submit()"><i class="fa fa-heart"></i></a>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="{{ route('cart.store') }}" method="post">
                                            @csrf
                                                <input type="hidden" name="product_id" value="{{ $single_product->id }}">
                                                <input type="hidden" value="1" name="product_quantity"/>
                                                <a href="#" onclick="event.preventDefault();
                                                this.parentElement.submit()"><i class="fa fa-shopping-bag"></i></a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ route('singleproduct', ['slug' => $single_product->slug]) }}">{{ $single_product->product_name }}</a></h3>
                                <p class="pull-left">{{ $single_product->product_price }}</p>
                                {{-- <ul class="pull-right d-flex">
                                    @for ($i = 0; $i <average_stars($single_product->id); $i++)
                                        <li><i class="fa fa-star"></i></li>
                                    @endfor
                                </ul> --}}
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @foreach ($categorys as $category)
            <div class="tab-pane" id="category_id_{{ $category->id }}">
                <ul class="row">
                    @foreach ($category->products as $single_product)
                    <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="product-wrap">
                            <div class="product-img">
                                <span>Sale</span>
                                <img src="{{ asset('uploads/product_photos') }}/{{$single_product->product_image}}" alt="">
                                <div class="product-icon flex-style">
                                    <ul>
                                        <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ route('singleproduct', ['slug' => $single_product->slug]) }}">{{ $single_product->product_name }}</a></h3>
                                <p class="pull-left">{{ $single_product->product_price }}</p>
                                {{-- <ul class="pull-right d-flex">
                                    @for ($i = 0; $i <average_stars($single_product->id); $i++)
                                        <li><i class="fa fa-star"></i></li>
                                    @endfor
                                </ul> --}}
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div> 
            @endforeach
        </div>
    </div>
</div>
<!-- product-area end -->
@endsection