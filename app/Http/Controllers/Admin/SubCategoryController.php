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

    //view brand add page
    public function SubCategoryEdit($id){
        $categories = Category::all();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.sub_category.edit', compact('categories','subcategory'));
    }

    //view brand add page
    public function SubCategoryUpdate(Request $request,$id){
        
        $category = Category::findOrFail($id)->first();

            $request->validate([
                'category_name_en' => 'required',
                'category_name_bn' => 'required',
                'category_icon' => 'required',
           ],[
               'brand_name_en.required' => 'Category name in English is required',
               'brand_name_bn.required' => 'Category name in Bangla is required'
           ]);

            if($category){
                $result = $category->update([
                    'category_name_en' => $request->category_name_en,
                    'category_name_bn' => $request->category_name_bn,
                    'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
                    'category_slug_bn' => str_replace(' ','-',$request->category_name_bn),
                    'category_icon' => $request->category_icon,
                    'updated_at' => Carbon::now(),
                ]);
                if($result){
                    $notification=array(
                        'message'=>'Subcategory updated Successfully',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('category.view')->with($notification);
                }else{
                    $notification=array(
                        'message'=>'Something went wrong!',
                        'alert-type'=>'warning'
                    );
                    return Redirect()->back()->with($notification);
                }

            }else{
                $notification=array(
                    'message'=>'Something went wrong!',
                    'alert-type'=>'warning'
                );
                return Redirect()->back()->with($notification);
            }
        }
        //Delete a brand
        public function SubCategoryDelete($id) {
            $brand = Category::findOrFail($id);

            $brand->delete();
            $notification=array(
            'message'=>'Subcategory Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        }

}