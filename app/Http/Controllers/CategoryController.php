<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class CategoryController extends Controller
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
        return view('category.index', [
            'categorys' => Category::latest()->paginate(5),
            'time' => now(),
            'count' => Category::count(),
            'deleted_categorys' => Category::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryForm $request)
    {
        //dd($request->all());
        $category_id = Category::insertGetId([
            'categoryname' => $request->categoryname,
            'categorydescription' => $request->categorydescription,
            'user_id' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);
        $this->image_upload($request, $category_id);
        return back()->with('success_status', $request->categoryname . ' category added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('category.edit', [
            'category' => Category::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryForm $request, Category $category)
    {
        $category->update([
            'categoryname' => $request->input('categoryname'),
            'categorydescription' => $request->input('categorydescription'),
        ]);
        $this->image_upload($request, $category->id);

        return redirect()->route('category.index')->with('status', $category->categoryname . ' Category updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('status', $category->categoryname . ' Category deleted successfully!!');
    }

    public function restore($id)
    {
        Category::onlyTrashed()->where('id', $id)->restore();
        $category = Category::findOrFail($id);
        return redirect()->route('category.index')->with('status', $category->categoryname . ' Category restored successfully!!');
    }

    public function force_delete($id)
    {
        //$category = Category::findOrFail($id);
        Category::onlyTrashed()->where('id', $id)->forceDelete();
        //$category->forceDelete();
        return redirect()->route('category.index')->with('status', ' Category deleted permanently!!');
    }

    public function image_upload(CategoryForm $request, $category_id)
    {

        $category = Category::findorFail($category_id);
        //dd($request->all(), $category, $request->hasFile('categoryimage'));
        if ($request->hasFile('categoryimage')) {
            if ($category->categoryimage != 'default_category.jpg') {
                //delete old photo
                $photo_location = 'public/uploads/category_photos/';
                $old_photo_location = $photo_location . $category->categoryimage;
                unlink(base_path($old_photo_location));
            }
            $photo_location = 'public/uploads/category_photos/';
            $uploaded_photo = $request->file('categoryimage');
            $new_photo_name = $category->id . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_location . $new_photo_name;
            Image::make($uploaded_photo)->resize(200, 200)->save(base_path($new_photo_location), 40);
            //$user = User::find($category->id);
            $check = $category->update([
                'categoryimage' => $new_photo_name,
            ]);
            return redirect()->route('category.index')->with([
                'type' => 'success',
                'success_status' => 'Profile Photo Upload Successfull!!!',
            ]);
        } else {
            return back()->with([
                'type' => 'danger',
                'success_status' => 'Please upload a valid image file',
            ]);
        }
    }
}
