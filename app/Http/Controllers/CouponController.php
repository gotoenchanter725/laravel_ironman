<?php

namespace App\Http\Controllers;

use App\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('coupon.index', [
            'coupons' => Coupon::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Coupon::insert([
            'coupon_name' => $request->input('coupon_name'),
            'discount_amount' => $request->input('discount_amount'),
            'minimum_purchase_amount' => $request->input('minimum_purchase_amount'),
            'validity_till' => $request->input('validity_till'),
            'created_at' => Carbon::now(),
            'added_by' => Auth::id(),
        ]);

        return redirect()->route('coupon.index')->with([
            'success_status' => 'Coupon added Successfully!!',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('coupon.edit', [
            'coupon' => $coupon,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $coupon->update([
            'coupon_name' => $request->input('coupon_name'),
            'discount_amount' => $request->input('discount_amount'),
            'minimum_purchase_amount' => $request->input('minimum_purchase_amount'),
            'validity_till' => $request->input('validity_till'),
            'created_at' => Carbon::now(),
            'added_by' => Auth::id(),
        ]);

        return redirect()->route('coupon.index')->with([
            'success_status' => 'Coupon updated Successfully!!',
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupon.index')->with([
            'success_status' => 'Coupon deleted Successfully!!',
            'type' => 'success',
        ]);
    }
}
