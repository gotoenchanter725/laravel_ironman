<header class="header-area">
    <div class="header-top bg-2">
        <div class="fluid-container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <ul class="d-flex header-contact">
                        <li><i class="fa fa-phone"></i> +01 123 456 789</li>
                        <li><i class="fa fa-envelope"></i> youremail@gmail.com</li>
                    </ul>
                </div>
                <div class="col-md-6 col-12">
                    <ul class="d-flex account_login-area">
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-user"></i>{{ Auth::user() ? Auth::user()->name: 'My Account'  }}<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown_style">
                                @auth
                                <li><a href="{{ route('customer.home') }}">Dashboard</a></li>
                                @endauth
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('customer.register') }}">Register</a></li>
                                <li><a href="{{ route('cart.index') }}">Cart</a></li>
                                <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                <li><a href="{{ route('wishlist.index') }}">wishlist</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                    document.getElementById('logout-form').submit();">
                                <i class="icon ion-power"></i> Log Out</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        <li><a href="{{ route('customer.register') }}"> Login/Register </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="fluid-container">
            <div class="row">
                <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                    <div class="logo">
                        <a href="{{ route('index') }}">
                    <img src="{{ asset('frontend_assets') }}/images/logo.png" alt="">
                    </a>
                    </div>
                </div>
                <div class="col-lg-7 d-none d-lg-block">
                    <nav class="mainmenu">
                        <ul class="d-flex">
                            <li class="{{ $pageTitle =='Home' ? 'active' : '' }}"><a href="{{ route('index') }}">Home</a></li>
                            <li class="{{ $pageTitle =='About' ? 'active' : '' }}"><a href="{{ route('about') }}">About</a></li>
                            <li>
                                <a href="javascript:void(0);">Shop <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    <li class="{{ $pageTitle =='Shop' ? 'active' : '' }}"><a href="{{ route('shop') }}">Shop Page</a></li>
                                    <li class="{{ $pageTitle =='Cart' ? 'active' : '' }}"><a href="{{ route('cart.index') }}">Shopping cart</a></li>
                                    <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                    <li><a href="{{ route('wishlist.index') }}">Wishlist</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Pages <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    {{-- <li class="{{ $pageTitle =='About' ? 'active' : '' }}"><a href="{{ route('about') }}">About Page</a></li> --}}
                                    {{-- <li><a href="single-product.html">Product Details</a></li>
                                    <li><a href="{{ route('cart.index') }}">Shopping cart</a></li>
                                    <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                    <li><a href="{{ route('wishlist.index') }}">Wishlist</a></li> --}}
                                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                                </ul>
                            </li>
                            <li class="{{ $pageTitle =='Blog' ? 'active' : '' }}">
                                <a href="javascript:void(0);">Blog <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    <li><a href="{{ route('blogs') }}">blog Page</a></li>
                                    {{-- <li><a href="{{ route('blogDetails', $post) }}">blog Details</a></li> --}}
                                </ul>
                            </li>
                            <li class="{{ $pageTitle =='Contact' ? 'active' : '' }}"><a href="{{ route('contactus') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                    <ul class="search-cart-wrapper d-flex">
                        <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a></li>
                        <li>
                            <a href="javascript:void(0);"><i class="flaticon-like"></i> <span>{{ total_wish_count() }}</span></a>
                            <ul class="cart-wrap dropdown_style">
                                @php
                                    $subtotal_wish = 0
                                @endphp
                                @foreach (wish_items() as $wish_item)
                                <li class="cart-items">
                                    <div class="cart-img">
                                        <img src="{{ asset('uploads/product_photos') }}/{{ $wish_item->product->product_image }}" width="70px" height="80px" alt="">
                                    </div>
                                    <div class="cart-content">
                                        <a href="{{ route('wishlist.index') }}">{{ Str::limit($wish_item->product->product_name,10)}}</a>
                                        <span>QTY : {{ $wish_item->product_quantity }}</span>
                                        <p>${{ $wish_item->product->product_price}}</p>
                                        <i class="fa fa-times"></i>
                                    </div>
                                </li>
                                @php
                                    $subtotal_wish += ($wish_item->product->product_price)
                                @endphp
                                @endforeach
                                <li>Subtotol: <span class="pull-right">${{ $subtotal_wish }}</span></li>
                                <li>
                                    <a href="{{ route('wishlist.index') }}" class="btn btn-danger">Go to Wishlist</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span>{{ total_cart_count() }}</span></a>
                            <ul class="cart-wrap dropdown_style">
                                @php
                                    $subtotal = 0
                                @endphp
                                @foreach ( cart_items() as $cart_item)
                                <li class="cart-items">
                                    <div class="cart-img">
                                        <img src="{{ asset('uploads/product_photos') }}/{{ $cart_item->product->product_image }}" width="70px" height="80px" alt="">
                                    </div>
                                    <div class="cart-content">
                                        <a href="{{ route('cart.index') }}">{{ Str::limit($cart_item->product->product_name,10)}}</a>
                                        <span>QTY : {{ $cart_item->product_quantity }}</span>
                                        <p>$ {{ $cart_item->product->product_price * $cart_item->product_quantity }}</p>
                                        @php
                                            $subtotal += ( $cart_item->product->product_price * $cart_item->product_quantity)
                                        @endphp
                                        <a href="{{ route('cart.remove', ['cart' => $cart_item->id]) }}" class="pd-r-1"><i class="fa fa-times"></i></a>
                                    </div>
                                </li>
                                @endforeach
                                <li>Subtotol: <span class="pull-right">${{ $subtotal }}</span></li>
                                <li>
                                    <a href="{{ route('cart.index') }}" class="btn btn-danger"> Go to Cart</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                    <div class="responsive-menu-tigger">
                        <a href="javascript:void(0);">
                    <span class="first"></span>
                    <span class="second"></span>
                    <span class="third"></span>
                    </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- responsive-menu area start -->
        <div class="responsive-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-block d-lg-none">
                        <ul class="metismenu">
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li class="sidemenu-items">
                                <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Shop({{ total_product_count() }}) </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{ route('shop') }}">Shop Page</a></li>
                                    <li><a href="{{ route('cart.index') }}">Shopping cart</a></li>
                                    <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                    <li><a href="{{ route('wishlist.index') }}">Wishlist</a></li>
                                </ul>
                            </li>
                            <li class="sidemenu-items">
                                <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Pages </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{ route('about') }}">About Page</a></li>
                                    <li><a href="{{ route('cart.index') }}">Shopping cart</a></li>
                                    <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                    <li><a href="{{ route('wishlist.index') }}">Wishlist</a></li>
                                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                                </ul>
                            </li>
                            <li class="sidemenu-items">
                                <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Blog</a>
                                <ul aria-expanded="false">
                                    <li><a href="{{ route('blogs') }}">Blog</a></li>
                                    {{-- <li><a href="blog-details.html">Blog Details</a></li> --}}
                                </ul>
                            </li>
                            <li><a href="{{ route('contactus') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- responsive-menu area start -->
    </div>
</header>