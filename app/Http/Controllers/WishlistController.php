<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.wishlist', [
            'wishlists' => Wishlist::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Cookie::get('g_wish_id')) {
            // if cookie is present then get the wish id from cookie facade
            $generated_wish_id = Cookie::get('g_wish_id');
        } else {
            // Else generate a random id to wish id cooke and then set it using cookie facade
            $generated_wish_id = Str::random(7) . rand(1, 1000);
            Cookie::queue('g_wish_id', $generated_wish_id, 1440); // name, value, $mintues
        }

        if (Wishlist::where('generated_wish_id', $generated_wish_id)->where('product_id', $request->input('product_id'))->exists()) {
            // product id is exists then increment product quantity
            //Wishlist::where('generated_wish_id', $generated_wish_id)->where('product_id', $request->input('product_id'))->increment('product_quantity', $request->input('product_quantity'));
        } else {
            // no previous product id found
            Wishlist::insert([
                'generated_wish_id' => $generated_wish_id,
                'product_id' => $request->input('product_id'),
                'created_at' => Carbon::now(),
            ]);

        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function wishlistremove(Wishlist $wishlist)
    {
        $wishlist->delete();
        return back()->with([
            'wish_status' => 'Item deleted Successfully!!',
            'type' => 'warning',
        ]);
    }
}
