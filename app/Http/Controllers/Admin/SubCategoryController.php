<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

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

}