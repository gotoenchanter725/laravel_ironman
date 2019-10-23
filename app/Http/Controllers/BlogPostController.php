<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Category;
use App\Http\Requests\BlogPostForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class BlogPostController extends Controller
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
        return view('blog.index', [
            'posts' => BlogPost::latest()->with('user')->paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostForm $request)
    {
        $post_id = BlogPost::insertGetId([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);
        $this->image_upload($request, $post_id);
        return back()->with('success_status', $request->title . ' post added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $post)
    {
        return view('blog.show', [
            'post' => $post,
            'categorys' => Category::all(),
            'recent_posts' => BlogPost::latest()->take(6)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $post)
    {
        return view('blog.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostForm $request, BlogPost $post)
    {
        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        $this->image_upload($request, $post->id);

        return redirect()->route('posts.index')->with('status', $post->title . ' post updated successfully!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $post)
    {
        $post->delete();
        return back()->with('success_status', $post->title . ' post deleted successfully!');
    }

    public function image_upload(BlogPostForm $request, $post_id)
    {

        $post = BlogPost::findorFail($post_id);
        //dd($request->all(), $post, $request->hasFile('postimage'));
        if ($request->hasFile('post_image')) {
            if ($post->post_image != 'default.jpg') {
                //delete old photo
                $photo_location = 'public/uploads/blogpost_photos/';
                $old_photo_location = $photo_location . $post->post_image;
                unlink(base_path($old_photo_location));
            }
            $photo_location = 'public/uploads/blogpost_photos/';
            $uploaded_photo = $request->file('post_image');
            $new_photo_name = $post->id . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_location . $new_photo_name;
            Image::make($uploaded_photo)->resize(870, 500)->save(base_path($new_photo_location), 40);
            //$user = User::find($post->id);
            $check = $post->update([
                'post_image' => $new_photo_name,
            ]);
            return redirect()->route('posts.index')->with([
                'type' => 'success',
                'success_status' => 'Post Photo Upload Successfull!!!',
            ]);
        } else {
            return back()->with([
                'type' => 'danger',
                'success_status' => 'Please upload a valid image file',
            ]);
        }
    }
}
