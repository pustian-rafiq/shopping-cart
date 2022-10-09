<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SubCategoryController extends Controller
{
     //view category page
     public function index(){
        $subCategories = SubCategory::latest()->get();
        return view('admin.sub_category.index', compact('subCategories'));
    }

    //view sub category add page
    public function SubCategoryAdd(){
        $categories = Category::all();
        return view('admin.sub_category.create',compact('categories'));
    }


    //Store new sub category
    public function SubCategoryStore(Request $request){
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
            'category_id' => 'required',
       ],[
           'subcategory_name_en.required' => 'SubC ategory name in English is required',
           'subcategory_name_bn.required' => 'Sub Category name in Bangla is required'
       ]);

            SubCategory::insert([
                'subcategory_name_en' => $request->subcategory_name_en,
                'subcategory_name_bn' => $request->subcategory_name_bn,
                'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
                'subcategory_slug_bn' => str_replace(' ','-',$request->subcategory_name_bn),
                'category_id' => $request->category_id,
                'created_at' => Carbon::now(),
            ]);

            $notification=array(
                'message'=>'Sub category added Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('subcategory.view')->with($notification);
       }

   

}