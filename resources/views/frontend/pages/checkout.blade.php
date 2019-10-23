@extends('layouts.frontend_app', [
    'breadCrumb' => 'true',
    'pageName' => 'Check Out',
    'pageTitle' => 'checkout'
])

@section('frontend_content')
<!-- checkout-area start -->
<div class="checkout-area ptb-100">
    <div class="container">
        <x-alert :type="session('type')" :message="session('order_status')"/>
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-form form-style">
                    <h3>Billing Details</h3>
                    <form action="{{ route('checkout.post') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <p>Name *</p>
                                <input type="text" name="name" placeholder="Enter Your Full Name" value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Email Address *</p>
                                <input type="email" name="email" placeholder="Enter Your Email" value="{{ old('email', $user->email) }}">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Phone No. *</p>
                                <input type="text" name="phone_number" placeholder="Enter Your Phone Number" value="{{ old('phone_number') }}">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Country *</p>
                                <select id="s_country_1" name="country_id">
                                    <option value="1">Select a country</option>
                                    @foreach ($countries as $country)    
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Town/City *</p>
                                <select id="s_city_1" name="city_id">
                                    <option value="">Select a city</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <p>Your Address *</p>
                                <input type="text" name="address" placeholder="Enter Your Address" value="{{ old('address') }}">
                            </div>

                            <div class="col-12">
                                <input id="toggle1" type="checkbox">
                                <label for="toggle1">Pure CSS Accordion</label>
                                <div class="create-account">
                                    <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                    <span>Account password</span>
                                    <input type="password">
                                </div>
                            </div>
                            <div class="col-12">
                                <input id="toggle2" type="checkbox" name="custom_shipping_status" value="1">
                                <label class="fontsize" for="toggle2">Ship to a different address?</label>
                                <div class="row" id="open2">
                                    <div class="col-12">
                                        <p>Name *</p>
                                        <input type="text" name="shipping_name" placeholder="Enter Your Full Name" value="{{ old('name', $user->name) }}">
                                    </div>
                                    <div class="col-12">
                                        <p>Email Address *</p>
                                        <input type="email" name="shipping_email" placeholder="Enter Your Email" value="{{ old('email', $user->email) }}">
                                    </div>
                                    <div class="col-12">
                                        <p>Phone No. *</p>
                                        <input type="text" name="shipping_phone_number" placeholder="Enter Your Phone Number">
                                    </div>
                                    <div class="col-12">
                                        <p>Country *</p>
                                        <select id="s_country_2" name="shipping_country_id">
                                            <option value="1">Select a country</option>
                                            @foreach ($countries as $country)    
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <p>Town/City *</p>
                                        <select id="s_city_2" name="shipping_city_id">
                                            <option value="1">Select a city</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <p>Your Address *</p>
                                        <input type="text" name="shipping_address" placeholder="Enter Your Address">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p>Order Notes </p>
                                <textarea placeholder="Notes about Your Order, e.g.Special Note for Delivery" name="shipping_order_notes"></textarea>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-area">
                    <h3>Your Order</h3>
                    <ul class="total-cost">
                        @foreach (cart_items() as $cart_item)
                            <li>{{ Str::limit($cart_item->product->product_name,30) }} X {{ $cart_item->product_quantity }}<span class="pull-right">$ {{ $cart_item->product->product_price * $cart_item->product_quantity}}</span></li>
                        @endforeach
                        <li>Subtotal <span class="pull-right"><strong>${{ session('cart_sub_total') }}</strong></span></li>
                        <li>Discount ({{ session('coupon_name') }}) <span class="pull-right"><strong>-${{ session('discount_amount') }}</strong></span></li>
                        <li>Shipping <span class="pull-right">Free</span></li>
                        <li>Total<span class="pull-right">${{ session('cart_total') }}</span></li>
                    </ul>
                    <ul class="payment-method">
                        <li>
                            <input id="delivery" type="radio"  name="payment_method" checked value="1">
                            <label for="delivery">Cash on Delivery</label>
                        </li>
                        <li>
                            <input id="bank" type="radio" name="payment_method" value="2">
                            <label for="bank">Direct Bank Transfer</label>
                        </li>
                        <li>
                            <input id="paypal" type="radio" name="payment_method" value="3">
                            <label for="paypal">Paypal</label>
                        </li>
                        <li>
                            <input id="card" type="radio" name="payment_method" value="4">
                            <label for="card">Credit Card</label>
                        </li>
                    </ul>
                    <button type="submit">Place Order</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout-area end -->
@endsection

@section('frontend.script')
<script>
    $(document).ready(function(){
        $('#s_country_1').select2();
        $('#s_country_2').select2();
        $('#s_city_1').select2();
        $('#s_city_2').select2();

        // ajax request start
        $('#s_country_1').change(function(){
            let country_id = $(this).val();
            // alert(`counrty id: ${country_id}`);

            // Ajax Setup
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });

            // Ajax Response Start to Server Database
            $.ajax({
                type: 'POST',
                url: '/get/city/list/ajax',
                data: {
                        country_id : country_id
                    },
                success: function(server_data){
                    // alert(server_data);
                    $('#s_city_1').html(server_data);
                }
            });
            // Ajax Response End to Server Database
        });
        // Ajax request end
        // ajax request start
        $('#s_country_2').change(function(){
            let country_id = $(this).val();
            // alert(`counrty id: ${country_id}`);

            // Ajax Setup
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });

            // Ajax Response Start to Server Database
            $.ajax({
                type: 'POST',
                url: '/get/city/list/ajax',
                data: {
                        country_id : country_id
                    },
                success: function(server_data){
                    // alert(server_data);
                    $('#s_city_2').html(server_data);
                }
            });
            // Ajax Response End to Server Database
        });
        // Ajax request end
    });
    
</script>
@endsection
