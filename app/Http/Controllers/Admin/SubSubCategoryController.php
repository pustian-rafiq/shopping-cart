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
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_bn' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
       ],[
           'subsubcategory_name_en.required' => 'Sub Category name in English is required',
           'subsubcategory_name_bn.required' => 'Sub Category name in Bangla is required',
           'category_id.required' => 'Category name is required',
           'subcategory_id.required' => 'Sub Category is required',
       ]);

       SubSubCategory::insert([
                'subsubcategory_name_en' => $request->subsubcategory_name_en,
                'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
                'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
                'subsubcategory_slug_bn' => str_replace(' ','-',$request->subsubcategory_name_bn),
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'created_at' => Carbon::now(),
            ]);

            $notification=array(
                'message'=>'Sub sub-category added Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('subsubcategory.view')->with($notification);
       }

    //view sub category edit page
    public function SubSubCategoryEdit($id){
        $categories = Category::all();
        $subsubcategory = SubSubCategory::findOrFail($id);
        return view('admin.sub_subcategory.edit', compact('categories','subsubcategory'));
    }

    //Update sub sub category
    public function SubSubCategoryUpdate(Request $request,$id){
        
        $subSubCategory = SubSubCategory::findOrFail($id);
        $request->validate([
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_bn' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
       ],[
           'subsubcategory_name_en.required' => 'Sub Category name in English is required',
           'subsubcategory_name_bn.required' => 'Sub Category name in Bangla is required',
           'category_id.required' => 'Category name is required',
           'subcategory_id.required' => 'Sub Category is required',
       ]);

            if($subSubCategory){
                $result = $subSubCategory->update([
                  
                    'subsubcategory_name_en' => $request->subsubcategory_name_en,
                    'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
                    'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
                    'subsubcategory_slug_bn' => str_replace(' ','-',$request->subsubcategory_name_bn),
                    'category_id' => $request->category_id,
                    'subcategory_id' => $request->subcategory_id,
                    'updated_at' => Carbon::now(),
                ]);
                if($result){
                    $notification=array(
                        'message'=>'Sub subcategory updated Successfully',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('subsubcategory.view')->with($notification);
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
    public function SubSubCategoryDelete($id) {
        $subsubcategory = SubSubCategory::findOrFail($id);

        $subsubcategory->delete();
        $notification=array(
        'message'=>'Sub Subcategory Deleted Successfully',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);
  }

     // Fetch sub sub-categories under a sub-category
     public function GetSubSubCategory($subcat_id){
        $subSubCat = SubSubCategory::where('subcategory_id',$subcat_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subSubCat);
    }
}