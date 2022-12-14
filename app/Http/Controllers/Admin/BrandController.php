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
                'message'=>'New brand added Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('brand.view')->with($notification);
       }
        //view brand add page
        public function BrandEdit($id){
            $brand = Brand::findOrFail($id)->first();
            return view('admin.brand.edit', compact('brand'));
        }

        //view brand add page
        public function BrandUpdate(Request $request,$id){
            
            $brand = Brand::findOrFail($id);
            $old_image = $request->old_image;
            $brand_image = $request->file('brand_image');

            $request->validate([
                'brand_name_en' => 'required',
                'brand_name_bn' => 'required',
           ],[
               'brand_name_en.required' => 'Brand name in English is required',
               'brand_name_bn.required' => 'Brand name in Bangla is required'
           ]);

           if($brand_image){
                unlink($old_image);
                $name_gen=hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
                Image::make($brand_image)->resize(166,110)->save('uploads/brand/'.$name_gen);
                $save_url = 'uploads/brand/'.$name_gen;

                $brand->update([
                    'brand_name_en' => $request->brand_name_en,
                    'brand_name_bn' => $request->brand_name_bn,
                    'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
                    'brand_slug_bn' => str_replace(' ','-',$request->brand_name_bn),
                    'brand_image' => $save_url,
                    'updated_at' => Carbon::now(),
                ]);

                $notification=array(
                    'message'=>'Brand updated Successfully',
                    'alert-type'=>'success'
                );
                return Redirect()->route('brand.view')->with($notification);
           }else{
            $brand->update([
                    'brand_name_en' => $request->brand_name_en,
                    'brand_name_bn' => $request->brand_name_bn,
                    'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
                    'brand_slug_bn' => str_replace(' ','-',$request->brand_name_bn),
                    'updated_at' => Carbon::now(),
                ]);

                $notification=array(
                    'message'=>'Brand updated Successfully',
                    'alert-type'=>'success'
                );
                return Redirect()->route('brand.view')->with($notification);
           }
        }
//Delete a brand
    public function BrandDelete($id) {
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);

        $brand->delete();
        $notification=array(
         'message'=>'Brand Deleted Successfully',
         'alert-type'=>'success'
     );
     return Redirect()->back()->with($notification);
    }
}