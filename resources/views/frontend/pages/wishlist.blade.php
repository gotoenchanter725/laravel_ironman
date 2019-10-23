@extends('layouts.frontend_app', [ 
    'breadCrumb' => 'true', 
    'pageName' => 'Wishlist', 
    'pageTitle' => 'Wishlist' 
    ]) 

@section('frontend_content')<!-- cart-area start -->
<div class="cart-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-alert :type="session('type')" :message="session('wish_status')"/>
                {{-- <form action="{{ route('cart.store') }}" method="POST">
                    @csrf --}}
                    <table class="table-responsive cart-wrap">
                        <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="stock">Stock Stutus </th>
                                <th class="addcart">Add to Cart</th>
                                <th class="remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wishlists as $wishlist)
                            <tr>
                                <td class="images"><img src="{{ asset('uploads/product_photos') }}/{{ $wishlist->product->product_image }}" alt=""></td>
                                <td class="product"><a href="{{ route('singleproduct', ['slug' => $wishlist->product->slug]) }}">{{ $wishlist->product->product_name }}</a></td>
                                <td class="ptice">${{ $wishlist->product->product_price }}</td>
                                @if ($wishlist->product->product_stock>0)
                                    <td class="stock">In Stock</td>
                                    <td class="addcart">
                                    <form action="{{ route('cart.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $wishlist->product->id }}">
                                        <input type="hidden" value="1" name="product_quantity"/>
                                        <a href="#" onclick="event.preventDefault();
                                        this.parentElement.submit()">ADD TO CART</a>
                                    </form>
                                    </td>    
                                @else
                                    <td class="stock"><span>Out of Stock</span></td>
                                    <td class="addcart"><span>Out of Stock</span></td>
                                @endif
                                
                                <td class="remove"><a href="{{ route('wishlist.remove', $wishlist) }}"><i class="fa fa-times"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->
@endsection