@extends('layouts.frontend_app', [
    'breadCrumb' => 'true',
    'pageName' => 'Shopping Cart',
    'pageTitle' => 'shopping cart'
])

@section('frontend_content')
<!-- cart-area start -->
<div class="cart-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-alert :type="session('type')" :message="session('cart_status')"/>
                <x-alert type="danger" :message="$error_message"/>

                <form action="{{ route('cart.update', ) }}" method="POST">
                    @csrf
                    <table class="table-responsive cart-wrap">
                        <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="quantity">Quantity</th>
                                <th class="total">Total</th>
                                <th class="remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $cart_sub_total = 0;
                                $flag = 0;
                            @endphp
                            @forelse ( cart_items() as $cart_item)
                            <tr id="out-of-stock" class="{{ $cart_item->product->product_stock<$cart_item->product_quantity ? 'bg-danger': '' }}">
                                <td class="images"><img src="{{ asset('uploads/product_photos') }}/{{ $cart_item->product->product_image }}" alt=""></td>
                                <td class="product">
                                    <a href="{{ route('singleproduct', ['slug' => $cart_item->product->slug]) }}">{{ $cart_item->product->product_name }}</a>
                                    <br>
                                    @if ($cart_item->product->product_stock<$cart_item->product_quantity)
                                        <span class="text-white lead"> Available: {{ $cart_item->product->product_stock }}. delete or reduce item to continue
                                        </span>
                                        @php
                                            $flag = 1;
                                        @endphp
                                    @endif
                                </td>
                                <td class="ptice">${{ $cart_item->product->product_price }}</td>
                                <td class="quantity cart-plus-minus">
                                    <input type="text" value="{{ $cart_item->product_quantity }}" name="product_info[{{ $cart_item->id }}]"/>
                                </td>
                                <td class="total">${{ $cart_item->product_quantity * $cart_item->product->product_price }}</td>
                                <td class="remove">
                                    <a href="{{ route('cart.remove', ['cart' => $cart_item->id]) }}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            @php
                                $cart_sub_total += ($cart_item->product_quantity * $cart_item->product->product_price)
                            @endphp
                            @empty
                            <tr>
                                <td colspan="50" class="text-center text-danger">No item found!!!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="row mt-60">
                        <div class="col-xl-4 col-lg-5 col-md-6 ">
                            <div class="cartcupon-wrap">
                                <ul class="d-flex">
                                    <li>
                                        <button class="btn btn-outline-info" type="submit">Update Cart</button>
                                    </form>
                                    </li>
                                    <li><a class="btn btn-outline-indigo" href="{{ route('shop') }}">Continue Shopping</a></li>
                                </ul>
                                <h3>Coupon</h3>
                                <p>Enter Your Coupon Code if You Have One</p>
                                <div class="coupon-wrap">
                                    <input type="text" placeholder="Coupon Code" id="apply_coupon_input" value="{{ $coupon_name }}">
                                    <button type="button" id="apply_coupon_btn">Apply Coupon</button>
                                </div>
                            </div>
                            @foreach ($valid_coupons as $coupon)
                                <button class="btn btn-success mt-3 available_coupon_btn" value="{{ $coupon->coupon_name }}" type="button">{{ $coupon->coupon_name }} - Shop {{ $coupon->minimum_purchase_amount }} /-</button>
                            @endforeach
                            <div class="row p-3 mt-3">
                                <x-alert type="danger" :message="$error_message"/>
                            </div>
                        </div>
                        <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                            <div class="cart-total text-right">
                                <h3>Cart Totals</h3>
                                <ul>
                                    <li><span class="pull-left">Subtotal </span>${{ $cart_sub_total }}</li>
                                    @php
                                        session(['cart_sub_total' => $cart_sub_total]);
                                    @endphp
                                    <li><span class="pull-left">Discount % </span>{{ $discount_amount }}%</li>
                                    <li><span class="pull-left">Discount Amount({{ ($coupon_name) ? $coupon_name:'-' }}) </span>${{ ($cart_sub_total*$discount_amount)/100 }}</li>
                                    @php
                                        session(['coupon_name' =>($coupon_name) ? $coupon_name:'-']);
                                        session(['discount_amount' => (($cart_sub_total*$discount_amount)/100)]);
                                    @endphp
                                    <li><span class="pull-left"> Total </span> ${{ $cart_sub_total-(($cart_sub_total*$discount_amount)/100) }}</li>
                                    @php
                                        session(['cart_total' => ($cart_sub_total-(($cart_sub_total*$discount_amount)/100))]);
                                    @endphp
                                </ul>
                                @if ($flag == 1)
                                    <a class="btn btn-danger disabled">Please resolve the issue first</a>
                                @else
                                    <a href="{{ route('checkout') }}">Proceed to Checkout</a>
                                @endif
                            </div>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
<!-- cart-area end -->
@endsection

@section('frontend.script')
    <script>
        $(document).ready(function(){
            $('#apply_coupon_btn').click(function(){
                let apply_coupon_input = $('#apply_coupon_input').val();
                let link_to_go = "{{ url('cart') }}/"+apply_coupon_input;
                // console.log(link_to_go);
                window.location.href= link_to_go;
            });
            $('.available_coupon_btn').click(function(){
                let apply_coupon_input = $('#apply_coupon_input').val($(this).val());
            });
        });
    </script>
@endsection
