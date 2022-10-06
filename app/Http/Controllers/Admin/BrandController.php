<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //view brand page
    public function index(){
        $brands = Brand::latest()->get();
        return view('admin.brand.index', compact('brands'));
    }
}