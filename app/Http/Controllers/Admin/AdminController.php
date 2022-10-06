<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.home');
    }
    //View profile setting page
    public function ProfileView(){
        return view('admin.profile.profile_setting');
    }
}
