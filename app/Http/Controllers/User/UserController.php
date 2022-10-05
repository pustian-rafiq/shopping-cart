<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
}