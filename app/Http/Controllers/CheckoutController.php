<?php

namespace App\Http\Controllers;

use App\Billing;
use App\City;
use App\Country;
use App\Http\Requests\PlaceOrderRequest;
use App\Mail\PurchaseConfirm;
use App\Order;
use App\OrderDetails;
use App\Product;
use App\Shipping;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('frontend.pages.checkout', [
            'user' => User::find(Auth::id()),
            'countries' => Country::all(),
        ]);
    }

    public function placeorder(PlaceOrderRequest $request)
    {
        //dd($request->all());
        // if different shipping address
        if ($request->input('custom_shipping_status')) {
            $shipping_id = Shipping::insertGetId([
                'name' => $request->input('shipping_name'),
                'email' => $request->input('shipping_email'),
                'phone_number' => $request->input('shipping_phone_number'),
                'address' => $request->input('shipping_address'),
                'country_id' => $request->input('shipping_country_id'),
                'city_id' => $request->input('shipping_city_id'),
                'order_notes' => $request->input('shipping_order_notes'),
                'payment_method' => $request->input('payment_method'),
                'created_at' => Carbon::now(),
            ]);
        } else { // if billing and shipping address is same
            $shipping_id = Shipping::insertGetId([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
                'address' => $request->input('address'),
                'country_id' => $request->input('country_id'),
                'city_id' => $request->input('city_id'),
                'order_notes' => $request->input('shipping_order_notes'),
                'payment_method' => $request->input('payment_method'),
                'created_at' => Carbon::now(),
            ]);
        }
        $billing_id = Billing::insertGetId([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'country_id' => $request->input('country_id'),
            'city_id' => $request->input('city_id'),
            'order_notes' => $request->input('shipping_order_notes'),
            'payment_method' => $request->input('payment_method'),
            'created_at' => Carbon::now(),
        ]);

        // Order Table data insert
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'sub_total' => session('cart_sub_total'),
            'discount_amount' => session('discount_amount'),
            'coupon_name' => session('coupon_name'),
            'total' => session('cart_total'),
            'payment_method' => $request->input('payment_method'),
            'billing_id' => $billing_id,
            'shipping_id' => $shipping_id,
            'created_at' => Carbon::now(),
        ]);

        //Order details table data insert using cart_items helpers
        foreach (cart_items() as $cart_item) {
            OrderDetails::insert([
                'order_id' => $order_id,
                'user_id' => Auth::id(),
                'product_id' => $cart_item->product_id,
                'product_quantity' => $cart_item->product_quantity,
                'product_price' => $cart_item->product->product_price,
                'created_at' => Carbon::now(),
            ]);
            // Update product table with decrement quantity
            Product::findOrFail($cart_item->product_id)->decrement('product_stock', $cart_item->product_quantity);
            // forceDelete from cart table
            $cart_item->forceDelete();
        }

        // if payment method is credit card then Go to stripe page
        if ($request->input('payment_method') == 4) {
            session(['order_id' => $order_id]);
            return redirect('stripe');
            // return view('Payment.stripe.stripe', [
            //     'order' => Order::find($order_id),
            //]);
        }

        // Send a order confirmation mail to Customer with order details
        $order = Order::with(['orderDetails', 'billing', 'shipping', 'paymentMethod'])
            ->where('id', $order_id)
            ->get();

        Mail::to($request->input('email'))->send(new PurchaseConfirm($order));

        // Send SMS to customer for order confirmation

        //return back with success message
        return redirect('cart')->with([
            'type' => 'success',
            'cart_status' => 'Your Order placed successfully!!!!',
        ]);
    }

    public function testmail()
    {
        $order = Order::with(['orderDetails', 'billing', 'shipping', 'paymentMethod'])
            ->where('id', 5)
            ->get();
        return (new PurchaseConfirm($order))->render();
    }

    public function testsms()
    {
        $order = Order::with(['orderDetails', 'billing', 'shipping', 'paymentMethod'])
            ->where('id', 5)
            ->first();

        // api code of bluksms.bd
        $url = "http://66.45.237.70/api.php";
        $number = $order->billing->phone_number; //"88017,88018,88019";
        $text = "Your Order#"+$order->id+"has benn successfully placed.Net payable amount is: $"+$order->total;
        $data = array(
            'username' => "YourID",
            'password' => "YourPasswd",
            'number' => "$number",
            'message' => "$text",
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|", $smsresult);
        $sendstatus = $p[0];
    }

    public function getCityListAjax(Request $request)
    {
        // echo $request->input('country_id');
        // die();
        $stringToSend = "";
        $cities = City::where('country_id', $request->input('country_id'))->get();

        foreach ($cities as $city) {
            // $stringToSend .= $city->name;
            $stringToSend .= "<option value='" . $city->id . "'>" . $city->name . "</option>";
        }
        //echo $stringToSend;
        return $stringToSend;
    }
}
