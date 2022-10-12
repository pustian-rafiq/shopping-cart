<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
      //view products page
      public function index(){
        $products = Product::latest()->get();
        return view('admin.product.index', compact('products'));
    }

    //view product add page
    public function ProductAdd(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.create', compact('brands','categories'));
    }
    //Store new product
    public function ProductStore(){
       return "success";
    }
}