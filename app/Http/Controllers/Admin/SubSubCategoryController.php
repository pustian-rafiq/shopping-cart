<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SubSubCategoryController extends Controller
{
    //view sub sub category page
    public function index(){
        $subSubCategories = SubSubCategory::latest()->get();
        return view('admin.sub_subcategory.index', compact('subSubCategories'));
    }

     //view sub category add page
     public function SubSubCategoryAdd(){
        $categories = Category::all();
        return view('admin.sub_subcategory.create',compact('categories'));
    }


    //Store new sub category
    public function SubSubCategoryStore(Request $request){
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
            'category_id' => 'required',
       ],[
           'subcategory_name_en.required' => 'SubC ategory name in English is required',
           'subcategory_name_bn.required' => 'Sub Category name in Bangla is required'
       ]);

       SubSubCategory::insert([
                'subcategory_name_en' => $request->subcategory_name_en,
                'subcategory_name_bn' => $request->subcategory_name_bn,
                'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
                'subcategory_slug_bn' => str_replace(' ','-',$request->subcategory_name_bn),
                'category_id' => $request->category_id,
                'created_at' => Carbon::now(),
            ]);

            $notification=array(
                'message'=>'Sub sub-category added Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('subsubcategory.view')->with($notification);
       }
}