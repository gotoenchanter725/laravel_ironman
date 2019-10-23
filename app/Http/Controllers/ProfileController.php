<?php

namespace App\Http\Controllers;

use App\Mail\ChangePasswordMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
        $this->middleware('checkrole');
    }

    public function index()
    {
        $users = User::all();
        $count = User::count();
        $time = now();

        // return view with compacting/binding data
        return view('admin.profile.index', compact('users', 'count', 'time'));

        // return view with binding manual data as an array
        //return view('home', ['users' => $users]);
    }

    public function editprofile()
    {
        //Image::make();
        return view('admin.profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::find(Auth::id());
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return back()->with([
            'type' => 'success',
            'form-status' => 'User profile has been updated!!!',
        ]);
    }

    public function password_update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
        ]);

        $user = User::find(Auth::id());
        // check old password is correct or not
        if (Hash::check($request->old_password, $user->password)) {
            if ($request->old_password == $request->password) {
                return back()->with([
                    'type' => 'danger',
                    'form-password-status', 'Try to provide New password',
                ]);
            } else {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }
            //Send a password change email notification start
            Mail::to($user->email)
                ->cc("john@mail.com")
                ->bcc("kamrul@mail.com")
                ->send(
                    new ChangePasswordMail(
                        $user->name
                    )
                );
            dd('SUCCESS');
            //Send a password change email notification end
            return back()->with([
                'type' => 'success',
                'form-password-status' => 'User password has been updated!!!',
            ]);
        } else {
            return back()->with([
                'type' => 'danger',
                'form-password-status' => 'Old user password is not matching with system!!!',
            ]);
        }
    }

    public function image_upload(Request $request)
    {
        $imageValidationRules = array(
            'profile_image' => 'image|mimes:jpeg,jpg,png|max:2000',
        );

        $validator = Validator::make($request->all(), $imageValidationRules);

        // check, if the uploaded file is image or not
        if ($validator->fails()) {
            return back()->with([
                'type' => 'danger',
                'form-image-status' => 'Please upload a valid image file',
            ]);
        } else {
            if ($request->hasFile('profile_image')) {
                if (Auth::user()->profile_image != 'default.jpg') {
                    //delete old photo
                    $photo_location = 'public/uploads/profile_photos/';
                    $old_photo_location = $photo_location . Auth::user()->profile_image;
                    unlink(base_path($old_photo_location));
                }
                $photo_location = 'public/uploads/profile_photos/';
                $uploaded_photo = $request->file('profile_image');
                $new_photo_name = Auth::id() . '.' . $uploaded_photo->getClientOriginalExtension();
                $new_photo_location = $photo_location . $new_photo_name;
                Image::make($uploaded_photo)->resize(150, 150)->save(base_path($new_photo_location), 40);
                $user = User::find(Auth::id());
                $check = $user->update([
                    'profile_image' => $new_photo_name,
                ]);

                return back()->with([
                    'type' => 'success',
                    'form-image-status' => 'Profile Photo Upload Successfull!!!',
                ]);
            } else {
                return back()->with([
                    'type' => 'danger',
                    'form-image-status' => 'Please upload a valid image file',
                ]);
            }
        }
    }
}
