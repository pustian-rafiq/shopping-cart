<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
class UserController extends Controller
{
    public function index(){
        return view('user.home');
    }

    //Update user profile 
    public function UpdateProfile(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ],[
            'name.required' => 'Please input your name',
        ]);

        User::findOrFail(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => Carbon::now(),
        ]);

        $notification=array(
            'message'=>'Your Profile is Updated',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

    // View image update page
    public function UpdateImage(){
        return view('user.image_update');
    }

      //update image
      public function StoreImage(Request $request){
        $old_image = $request->old_image;

        if (Auth::user()->photo == 'frontend/media/default.png') {
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('frontend/media/'.$name_gen);
            $save_url = 'frontend/media/'.$name_gen;
            User::findOrFail(Auth::id())->Update([
                'photo' => $save_url
            ]);
            $notification=array(
                'message'=>'Image Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        }else {
            unlink($old_image);
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('frontend/media/'.$name_gen);
            $save_url = 'frontend/media/'.$name_gen;
            User::findOrFail(Auth::id())->Update([
                'photo' => $save_url
            ]);
            $notification=array(
                'message'=>'Image Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // View password update page
    public function UpdatePassword(){
        return view('user.update_password');
    }

    // Store updated password
    public function StorePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'password_confirmation' => 'required|min:6',
        ],[
        //    'old_password.same' => "The password is not correct",
        //    'password_confirmation.confirmed' => "The re-type password must be same with the new password",
        ]);

        $db_pass = Auth::user()->password;
        $old_password = $request->old_password;
        $newpass = $request->new_password;
        $confirmpass = $request->password_confirmation;

       if (Hash::check($old_password,$db_pass)) {
          if ($newpass === $confirmpass) {
              User::findOrFail(Auth::id())->update([
                'password' => Hash::make($newpass)
              ]);

              Auth::logout();
              $notification=array(
                'message'=>'Your Password Change Success. Now Login With New Password',
                'alert-type'=>'success'
            );
            return Redirect()->route('login')->with($notification);

          }else {

            $notification=array(
                'message'=>'New Password And Confirm Password Not Same',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
          }
       }else {
        $notification=array(
            'message'=>'Old Password Not Match',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
       }
    }

}