<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
// Route for frontend pages
Route::get('/', 'FrontendController@index')->name('index');
Route::get('/contactus', 'FrontendController@contactus')->name('contactus');
Route::get('/about', 'FrontendController@about')->name('about');
Route::get('/service', 'FrontendController@service')->name('service');
Route::get('/blogs', 'FrontendController@blog')->name('blogs');
Route::get('/shop', 'FrontendController@shop')->name('shop');
Route::get('/faq', 'FrontendController@faq')->name('faq');
Route::get('/wishlist', 'FrontendController@wishlist')->name('wishlist');
Route::get('/blog-details/{post}', 'FrontendController@blogDetails')->name('blogDetails');
Route::post('/review/post', 'FrontendController@reviewpost')->name('review.post');
Route::get('/search', 'FrontendController@search')->name('search');

// Checkout routes
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/checkout/post', 'CheckoutController@placeorder')->name('checkout.post');

// Test mail and sms routes
Route::get('/test/mail', 'CheckoutController@testmail')->name('test.mail');
Route::get('/test/sms', 'CheckoutController@testsms')->name('test.sms');

Route::get('/product/details/{slug}', 'FrontendController@singleproduct')->name('singleproduct');
Route::post('/client/message', 'FrontendController@clientMessage')->name('clientmessage');
Route::get('/customer/register', 'FrontendController@customerregister')->name('customer.register');
Route::post('/customer/register', 'FrontendController@customerregisterpost')->name('customer.register.form');
// Route::get('/customer/login', 'FrontendController@customerlogin')->name('customer.login');
// Route::post('/customer/login', 'FrontendController@customerloginpost')->name('customer.login.form');

// Testimonial of Frontend routes
Route::resource('/testimonial', 'TestimonialController');

// Route for authenrtication
Auth::routes();

// Github route for login
Route::get('login/github', 'GitHubController@redirectToProvider')->name('login.github');
Route::get('login/github/callback', 'GitHubController@handleProviderCallback');

// Facebook route for login
Route::get('login/facebook', 'FaceBookController@redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'FaceBookController@handleProviderCallback');

// Google route for login
Route::get('login/google', 'GoogleController@redirectToProvider')->name('login.google');
Route::get('login/google/callback', 'GoogleController@handleProviderCallback');

// Route for Dashboard
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/send/newsletter', 'HomeController@sendnewsletter')->name('newsletter');
Route::get('/contact/uploads/download/{client_id}', 'HomeController@contactuploadsDownload');

// Route for todo tasks
Route::resource('/todos', 'TodoController')->middleware('auth');
Route::put('/todos/{todo}/complete', 'TodoController@complete')->name('todo.complete');

// Route for Contact
Route::resource('/contact', 'ContactController')->middleware('auth');
Route::get('/contact/restore/{contact_id}', 'ContactController@restore')->middleware('auth')->name('contact.restore');
Route::post('/contact/delete/{contact_id}', 'ContactController@force_delete')->middleware('auth')->name('contact.forcedelete');

// Route for Category
Route::resource('/category', 'CategoryController')->middleware('auth');
Route::post('/category/delete/{category_id}', 'CategoryController@force_delete')->middleware('auth')->name('category.forcedelete');
Route::get('/category/restore/{category_id}', 'CategoryController@restore')->middleware('auth')->name('category.restore');

// Route for Product
Route::resource('/product', 'ProductController');
Route::post('/mark/delete', 'ProductController@markdelete')->name('markdelete');

// Route for Profile
Route::get('/profile', 'ProfileController@index')->middleware('auth')->name('profile.index');
Route::get('edit/profile', 'ProfileController@editprofile')->middleware('auth')->name('profile.edit');
Route::post('update/profile', 'ProfileController@update')->middleware('auth')->name('profile.update');
Route::post('update/profile/password', 'ProfileController@password_update')->middleware('auth')->name('profile.password');
Route::post('update/profile/image', 'ProfileController@image_upload')->middleware('auth')->name('profile.image');

// Route for BlogPost
Route::resource('/posts', 'BlogPostController');

// Route for Comments
Route::resource('/comments', 'PostCommentController')->only(['store']);

// Route for Cart
Route::post('/cart/store', 'CartController@store')->name('cart.store');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/remove/{cart}', 'CartController@cartremove')->name('cart.remove');
Route::post('/cart/update', 'CartController@update')->name('cart.update');
Route::get('/cart/{coupon_name}', 'CartController@index')->name('cart.coupon');

// Route for Wishlist
Route::post('/wishlist/store', 'WishlistController@store')->name('wishlist.store');
Route::get('/wishlist', 'WishlistController@index')->name('wishlist.index');
Route::get('/wishlist/remove/{wishlist}', 'WishlistController@wishlistremove')->name('wishlist.remove');

// Route for Coupoun
Route::resource('coupon', 'CouponController');

// Route for Orders
Route::resource('/orders', 'OrdersController');

// Route for Customer
Route::get('customer/home', 'CustomerController@home')->name('customer.home');
Route::get('/customer/invoice/download/{order_id}', 'CustomerController@invoiceDownload')->name('invoice.download');

// Route for Ajax Requests
Route::post('/get/city/list/ajax', 'CheckoutController@getCityListAjax');

// Route for striper payment
Route::get('stripe', 'StripePaymentController@stripe')->name('stripe');
Route::post('/stripe/post', 'StripePaymentController@stripePost')->name('stripe.post');

// SSLCOMMERZ Start
Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');

Route::post('/pay', 'SslCommerzPaymentController@index');
Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');

Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END