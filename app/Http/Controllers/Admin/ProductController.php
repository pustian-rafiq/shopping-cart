<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductPostRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultipleImage;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
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
    public function ProductStore(ProductPostRequest $request){

        // Retrieve the validated input data...
        $validated = $request->validated();

        $image = $request->file('product_thambnail');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('uploads/products/thumbnail/'.$name_gen);
        $save_url = 'uploads/products/thumbnail/'.$name_gen;

       $product_id = Product::insertGetId([
            'user_id' => Auth::id(),
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_name_bn' => $request->product_name_bn,
            'product_slug_bn' => str_replace(' ','-',$request->product_name_bn),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_bn' => $request->short_descp_bn,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bn' => $request->long_descp_bn,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thambnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),


            ]);

            //////////////////// Multiple image uplod start /////////////////////////////////

            $images = $request->file('multi_img');
            foreach ($images as $img) {
                $make_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(917,1000)->save('uploads/products/multiple_image/'.$make_name);
                $uplodPath = 'uploads/products/multiple_image/'.$make_name;

                MultipleImage::insert([
                    'product_id' => $product_id,
                    'photo_name' => $uplodPath,
                    'created_at' => Carbon::now(),
                ]);
            }
            //////////////////// Multiple image uplod End /////////////////////////////////


            $notification=array(
                'message'=>'Product Added Success',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
      }

     //view product edit page
     public function ProductEdit($id){
        $editProduct = Product::findOrFail($id);
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $multiple_images = MultipleImage::all();
        return view('admin.product.edit', compact('editProduct','brands','categories','multiple_images'));
    }
     //Update product
     public function ProductUpdate(ProductUpdateRequest $request,$id){
        $updateProduct = Product::findOrFail($id);
        
         // Retrieve the validated input data...
         $validated = $request->validated();
      
             if($updateProduct){
                $result =  $updateProduct->update([
                    'user_id' => Auth::id(),
                    'brand_id' => $request->brand_id,
                    'category_id' => $request->category_id,
                    'subcategory_id' => $request->subcategory_id,
                    'subsubcategory_id' => $request->subsubcategory_id,
                    'product_name_en' => $request->product_name_en,
                    'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
                    'product_name_bn' => $request->product_name_bn,
                    'product_slug_bn' => str_replace(' ','-',$request->product_name_bn),
                    'product_code' => $request->product_code,
                    'product_qty' => $request->product_qty,
                    'product_tags_en' => $request->product_tags_en,
                    'product_tags_bn' => $request->product_tags_bn,
                    'product_size_en' => $request->product_size_en,
                    'product_size_bn' => $request->product_size_bn,
                    'product_color_en' => $request->product_color_en,
                    'product_color_bn' => $request->product_color_bn,
                    'selling_price' => $request->selling_price,
                    'discount_price' => $request->discount_price,
                    'short_descp_en' => $request->short_descp_en,
                    'short_descp_bn' => $request->short_descp_bn,
                    'long_descp_en' => $request->long_descp_en,
                    'long_descp_bn' => $request->long_descp_bn,
                    'hot_deals' => $request->hot_deals,
                    'featured' => $request->featured,
                    'special_offer' => $request->special_offer,
                    'special_deals' => $request->special_deals,
                    'status' => 1,
                    'updated_at' => Carbon::now(),
                    ]);

                if($result){
                    $notification=array(
                        'message'=>'Product updated Successfully',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('product.view')->with($notification);
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
}