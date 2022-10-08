<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    //view brand page
    public function index(){
        $brands = Brand::latest()->get();
        return view('admin.brand.index', compact('brands'));
    }

    //view brand add page
    public function BrandAdd(){
        $brands = Brand::latest()->get();
        return view('admin.brand.create');
    }

    //Store new brand
    public function BrandStore(Request $request){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_bn' => 'required',
            'brand_image' => 'required',
       ],[
           'brand_name_en.required' => 'Brand name in English is required',
           'brand_name_bn.required' => 'Brand name in Bangla is required'
       ]);

            $image = $request->file('brand_image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,110)->save('uploads/brand/'.$name_gen);
            $save_url = 'uploads/brand/'.$name_gen;

            Brand::insert([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
                'brand_slug_bn' => str_replace(' ','-',$request->brand_name_bn),
                'brand_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            $notification=array(
                'message'=>'New brand Upload Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('brand.view')->with($notification);
    }
}