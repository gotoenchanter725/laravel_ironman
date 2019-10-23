<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Category;
use App\ClientMessage;
use App\OrderDetails;
use App\Product;
use App\ProductImage;
use App\Testimonial;
use App\User;
use App\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class FrontendController extends Controller
{
    public function index()
    {
        $bestSell = DB::table('order_details')
                    ->select('product_id', DB::raw('count(*) as total'))
                    ->groupBy('product_id')
                    ->get();
        $bestSellers = $bestSell->sortByDesc('total')->take(4);
        //$best_sellers = Product::where('id', $bestSellers->product_id)->get();
        //dd($bestSellers;
        
        return view('frontend.pages.index', [
            'categories' => Category::all(),
            'products' => Product::latest()->take(8)->get(),
            'testimonials' => Testimonial::latest()->take(4)->get(),
            'best_sellers' => $bestSellers,
        ]);
    }

    public function singleproduct($slug)
    {
        $product_info = Product::where('slug', $slug)->get()->first();
        $product_images = ProductImage::where('product_id', $product_info->id)->get();
        $related_products = Product::where('category_id', $product_info->category_id)->where('slug', '!=', $slug)->get();

        // show review form to enlisted customer
        $show_review_form = 0;
        if(OrderDetails::where('user_id', Auth::id())
                        ->where('product_id',$product_info->id)
                        ->whereNull('review')
                        ->exists()){
                    $order_detail_id = OrderDetails::where('user_id', Auth::id())
                            ->where('product_id',$product_info->id)
                            ->whereNull('review')
                            ->first()->id;
            $show_review_form = 1;
        }else{
            $show_review_form = 2;
            $order_detail_id =0;
        }

        // here find total reviews of this product
        $reviews = OrderDetails::where('product_id', $product_info->id)
                                ->whereNotNull('review')->get();
        
        // dd($product_info, $related_product);
        return view('frontend.pages.single_product', [
            'product_info' => $product_info,
            'related_products' => $related_products,
            'product_images' => $product_images,
            'show_review_form' => $show_review_form,
            'order_detail_id' => $order_detail_id,
            'reviews' => $reviews,
        ]);
    }

    public function contactus()
    {
        return view('frontend.pages.contact');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function blog()
    {
        return view('frontend.pages.blog', [
            'posts' => BlogPost::latest()->with('user')->paginate(6),
        ]);
    }

    public function blogDetails($id)
    {
        $post_info = BlogPost::withCount('comments')->findOrFail($id);
        $recent_posts = BlogPost::latest()->take(6)->get();
        //dd($id, $post_info);
        return view('frontend.pages.blog-details', [
            'post' => $post_info,
            'categorys' => Category::latest()->take(6)->get(),
            'recent_posts' => $recent_posts,
        ]);
    }

    public function shop()
    {
        return view('frontend.pages.shop', [
            'categorys' => Category::with('products')->get(),
            'products' => Product::all(),
        ]);
    }

    public function service()
    {
        return view('service');
    }

    public function clientMessage(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'fname' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
        ]);

        $client_id = ClientMessage::insertGetId([
            'fname' => $request->input('fname'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'msg' => $request->input('msg'),
            'created_at' => Carbon::now(),
        ]);

        $client_file = ClientMessage::findOrFail($client_id);
        if ($request->hasFile('client_upload_file')) {
            $file = $request->file('client_upload_file');
            $file_name = $client_id . '.' . $file->guessExtension();
            $path = $file->storeAs('/client_uploads', $file_name);
            $client_file->update([
                'client_upload_file' => $path,
            ]);
            return back()->with([
                'success_status' => 'Thank you',
                'type' => 'info',
            ]);
        }

        return back()->with([
            'success_status' => 'Thanks for you Message, we will soon get back to you',
            'type' => 'success',
        ]);
    }

    public function faq()
    {
        return view('frontend.pages.faq');
    }

    public function wishlist()
    {
        return view('frontend.pages.wishlist');
    }

    public function customerregister()
    {
        return view('customer.register');
    }

    public function customerregisterpost(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'user_role' => 2,
            'password' => Hash::make($request->input('password')),
            'created_at' => Carbon::now(),
        ]);
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('customer.home');
        }
    }

    public function reviewpost(Request $request)
    {   
        //dd($request->all());
        OrderDetails::findOrFail($request->input('order_detail_id'))->update([
            'stars' => $request->input('stars'),
            'review' => $request->input('review'),
        ]);

        return back();
    }

    public function search()
    {
        $results = QueryBuilder::for(Product::class)
                ->allowedFilters(['product_name', 'category_id'])
                ->allowedSorts(['product_name'])
                ->get();

        return view('frontend.pages.search', [
            'results' => $results,
            'count' => $results->count(),
        ]);
    }
}
