<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //Show front index page
    public function index(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $sub_subcategories = SubSubCategory::orderBy('subsubcategory_name_en', 'ASC')->get();
        $sliders = Slider::where('status', 1)->latest()->take(5)->get();
        $products = Product::latest()->get();

        return view('frontend.index', compact('categories','subcategories','sub_subcategories','sliders','products'));
    }

    //Fetch all categories
    // public function getAllCategories(){
    //     $categories = Category::orderBy('category_name_en', 'ASC')->get();
    //     $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
    //     $sub_subcategories = SubSubCategory::orderBy('subsubcategory_name_en', 'ASC')->get();
    //     return view('frontend.index',);
    // }
}