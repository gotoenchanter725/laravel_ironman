<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetails;
use App\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index',[
            'orders' => Order::with(['orderDetails', 'billing', 'shipping', 'paymentMethod'])
                ->latest()->paginate(15),
            'count' => Order::count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $order->update([
            'payment_status' => 2,
        ]);

        return redirect()->route('orders.index')->with([
            'status' => 'Payment received Successfully!!',
            'type' => 'success',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // return back the product into Product table
        $order_details = OrderDetails::where('order_id', $order->id)->get();
        foreach ($order_details as $order_detail) { 
            Product::find($order_detail->product_id)->increment('product_stock', $order_detail->product_quantity);
        }
        // then update payment status of Order table to 3 for Order Cancelation 
        $order->update([
            'payment_status' => 3
        ]);

        return redirect()->route('orders.index')->with([
            'status' => 'Order Canceled Successfully!!',
            'type' => 'success',
        ]);
    }
}
