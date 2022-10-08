<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
       //view categories page
       public function index(){
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }
}