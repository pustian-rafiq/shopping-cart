<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
class CategoryController extends Controller
{
       //view categories page
       public function index(){
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }
     //view brand add page
     public function CategoryAdd(){
        $brands = Category::latest()->get();
        return view('admin.category.create');
    }

    //Store new brand
    public function CategoryStore(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
            'category_icon' => 'required',
       ],[
           'brand_name_en.required' => 'Brand name in English is required',
           'brand_name_bn.required' => 'Brand name in Bangla is required'
       ]);

            Category::insert([
                'category_name_en' => $request->category_name_en,
                'category_name_bn' => $request->category_name_bn,
                'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
                'category_slug_bn' => str_replace(' ','-',$request->category_name_bn),
                'category_icon' => $request->category_icon,
                'created_at' => Carbon::now(),
            ]);

            $notification=array(
                'message'=>'New category added Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('category.view')->with($notification);
       }
}