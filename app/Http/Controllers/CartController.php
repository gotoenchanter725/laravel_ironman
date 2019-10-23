<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index($coupon_name = "")
    {
        // dd($coupon);
        $error_message = '';
        $subtotal = 0;
        $discount_amount = 0;

        if ($coupon_name == "") {
            $error_message = "";
        } else {
            if (!Coupon::where('coupon_name', $coupon_name)->exists()) {
                $error_message = "This coupon is invalid!!!!";
            } else {
                $couponValidity = Coupon::where('coupon_name', $coupon_name)->first()->validity_till;
                $todayDate = Carbon::now()->format('Y-m-d');

                // now check coupon validity
                if ($todayDate > $couponValidity) {
                    // if not valid
                    $error_message = "This coupon has been expired";
                } else {
                    // if valid, then check purchase amount
                    foreach (cart_items() as $cart_item) {
                        $subtotal += ($cart_item->product->product_price * $cart_item->product_quantity);
                    }
                    // if purchase amount is greather than minimum puchase amount
                    if (Coupon::where('coupon_name', $coupon_name)->first()->minimum_purchase_amount > $subtotal) {
                        // else throw an error message
                        $error_message = "You have to purchase: " . Coupon::where('coupon_name', $coupon_name)->first()->minimum_purchase_amount;
                    } else {
                        // then allow the discount amount
                        $discount_amount = Coupon::where('coupon_name', $coupon_name)->first()->discount_amount;
                    }
                }
            }
        }

        $valid_coupons = Coupon::whereDate('validity_till', '>=', Carbon::now()->format('Y-m-d'))->get();

        return view('frontend.pages.cart', [
            'cart' => Cart::all(),
            'error_message' => $error_message,
            'discount_amount' => $discount_amount,
            'coupon_name' => $coupon_name,
            'valid_coupons' => $valid_coupons,
        ]);
    }

    public function store(Request $request)
    {
        if (Cookie::get('g_cart_id')) {
            // if cookie is present then get the cart id from cookie facade
            $generated_cart_id = Cookie::get('g_cart_id');
        } else {
            // Else generate a random id to cart id cooke and then set it using cookie facade
            $generated_cart_id = Str::random(7) . rand(1, 1000);
            Cookie::queue('g_cart_id', $generated_cart_id, 1440); // name, value, $mintues
        }

        if (Cart::where('generated_cart_id', $generated_cart_id)->where('product_id', $request->input('product_id'))->exists()) {
            // product id is exists then increment product quantity
            Cart::where('generated_cart_id', $generated_cart_id)->where('product_id', $request->input('product_id'))->increment('product_quantity', $request->input('product_quantity'));
        } else {
            // no previous product id found
            Cart::insert([
                'generated_cart_id' => $generated_cart_id,
                'product_id' => $request->input('product_id'),
                'product_quantity' => $request->input('product_quantity'),
                'created_at' => Carbon::now(),
            ]);

        }
        return redirect()->back();
    }

    public function cartremove($cart)
    {
        Cart::findOrFail($cart)->delete();
        return back()->with([
            'cart_status' => 'Item deleted Successfully!!',
            'type' => 'warning',
        ]);
    }

    public function update(Request $request)
    {

        foreach ($request->product_info as $cart_id => $product_quantity) {

            if ($product_quantity < 0) {
                // if product quantity becomes zero then show error
                return back()->with([
                    'cart_status' => "Product quantity can't be zero!!",
                    'type' => 'danger',
                ]);
            } else if ($product_quantity == 0) {
                // if product removed
                Cart::findOrFail($cart_id)->delete();
            } else {
                // else if product quantity updated then update
                Cart::findOrFail($cart_id)->update([
                    'product_quantity' => $product_quantity,
                ]);
            }

        }

        return back()->with([
            'cart_status' => 'Item updated Successfully!!',
            'type' => 'success',
        ]);
    }
}
