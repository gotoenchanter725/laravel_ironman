<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Facades\Auth;
use PDF;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home($coupon_name = "")
    {
        return view('customer.home', [
            'orders' => Order::with(['orderDetails', 'billing', 'shipping', 'paymentMethod'])
                ->where('user_id', Auth::id())
                ->get(),
            'count' => Order::count(),
        ]);
    }

    public function invoiceDownload($order_id)
    {
        $order = Order::find($order_id);
        $billing_info = $order->billing;
        $order_details = $order->orderDetails;
        //dd($order, $billing_info, $order_details);
        $data = [
            'order' => $order,
            'billing_info' => $billing_info,
            'order_details' => $order_details,
        ];

        $pdf = PDF::loadView('pdf.invoice', $data);
        return $pdf->download('invoice_' . $order_id . '.pdf');
        // return view('PDF.invoice', [
        //     'orders' => $orders,
        // ]);
    }
}
