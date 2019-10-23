<?php

namespace App\Http\Controllers;

use App\ClientMessage;
use App\Mail\SendNewsLetter;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $count = ClientMessage::count();
        $clientMessage = ClientMessage::all();
        $time = now();
        $paid = Order::where('payment_status', 1)->count();
        $unpaid = Order::where('payment_status', 2)->count();
        $cancel = Order::where('payment_status', 3)->count();
        $total_sales = Order::where('payment_status',2)->sum('total');
        $total_inventory = 0;
        foreach (Product::all() as $product) {
            $total_inventory += ($product->product_price*$product->product_stock);
        }

        // return view with compacting/binding data
        return view('home', compact('users', 'count', 'time', 'clientMessage', 'paid', 'unpaid', 'cancel', 'total_sales', 'total_inventory'));

        // return view with binding manual data as an array
        //return view('home', ['users' => $users]);
    }

    public function sendnewsletter()
    {
        $users_email = ClientMessage::all()->pluck('email');
        //$users_email = User::find(26)->email;
        // foreach ($users_email as $email) {
        Mail::to($users_email)
            ->send(new SendNewsLetter());
        // }
        return back()->with([
            'type' => 'success',
            'status' => 'News Letter Sent to all users in the list!!!',
        ]);
    }

    public function contactuploadsDownload($client_id)
    {
        return Storage::download(ClientMessage::findOrFail($client_id)->client_upload_file);
    }
}
