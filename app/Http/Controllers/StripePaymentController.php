<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        if(session('order_id'))
        {
            return view('Payment.stripe.stripe');
        }else{
            abort(404);
        }
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $order = Order::find($request->input('order_id'));
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $order->total * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Order #" . $order->id . " payment has been done",
        ]);
        // update payment status
        $order->update([
            'payment_status' => 2,
        ]);
        //Session::flash('success', 'Payment successful!');

        // remove session informations
        session([
            'order_id' => '',
            'coupon_name' => '',
            'discount_amount' => '',
            'cart_sub_total' => '',
            'cart_total' => '',
        ]);
        
        return redirect()->route('cart.index')->with([
            'type' => 'success',
            'cart_status' => 'Payment Successfull!',
        ]);
    }
}
