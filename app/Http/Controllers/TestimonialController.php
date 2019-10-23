<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialRequest;
use App\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class TestimonialController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
        $this->middleware('checkrole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('testimonial.index', [
            'testimonials' => Testimonial::latest()->paginate(5),
            'time' => now(),
            'count' => Testimonial::count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        $testimonial_id = Testimonial::insertGetId([
            'client_name' => $request->input('client_name'),
            'client_message' => $request->input('client_message'),
            'client_position' => $request->input('client_position'),
            'created_at' => Carbon::now(),
        ]);
        $this->image_upload($request, $testimonial_id);

        return back()->with('success_status', $request->client_name . 'added successfully!');
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
    public function edit(Testimonial $testimonial)
    {
        return view('testimonial.edit', [
            'testimonial' => $testimonial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, Testimonial $testimonial)
    {
        $testimonial->update([
            'client_name' => $request->input('client_name'),
            'client_message' => $request->input('client_message'),
            'client_position' => $request->input('client_position'),
        ]);
        $this->image_upload($request, $testimonial->id);

        return redirect()->route('testimonial.index')->with([
            'success_status' => 'Testimonial updated Successfully!!',
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('testimonial.index')->with([
            'success_status' => 'Testimonial delete Successfully!!',
            'type' => 'success',
        ]);
    }

    public function image_upload(TestimonialRequest $request, $item_id)
    {

        $testimonial = Testimonial::findorFail($item_id);
        //dd($request->all(), $category, $request->hasFile('categoryimage'));
        if ($request->hasFile('client_image')) {
            if ($testimonial->client_image != 'default_client.jpg') {
                //delete old photo
                $photo_location = 'public/uploads/client_photos/';
                $old_photo_location = $photo_location . $testimonial->client_image;
                unlink(base_path($old_photo_location));
            }
            $photo_location = 'public/uploads/client_photos/';
            $uploaded_photo = $request->file('client_image');
            $new_photo_name = $testimonial->id . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_location . $new_photo_name;
            Image::make($uploaded_photo)->resize(200, 200)->save(base_path($new_photo_location), 40);
            //$user = User::find($category->id);
            $check = $testimonial->update([
                'client_image' => $new_photo_name,
            ]);
            return redirect()->route('testimonial.index')->with([
                'type' => 'success',
                'success_status' => 'Testimonial Photo Upload Successfull!!!',
            ]);
        } else {
            return back()->with([
                'type' => 'danger',
                'success_status' => 'Please upload a valid image file',
            ]);
        }
    }
}
