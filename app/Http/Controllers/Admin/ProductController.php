<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductPostRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
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

            //////////////////// Multiple image upload start /////////////////////////////////

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
            return Redirect()->route('product.view')->with($notification);
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

    // update product thumbnail
    public function ProductThumbnailUpdate(Request $request,$id){
        $updateProduct = Product::findOrFail($id);
        $old_image = $request->old_image;
        unlink($old_image);

        if($updateProduct){
            $thumbnail_image = $request->file('product_thambnail');
            $image_name=hexdec(uniqid()).'.'.$thumbnail_image->getClientOriginalExtension();
            Image::make($thumbnail_image)->resize(917,1000)->save('uploads/products/thumbnail/'.$image_name);
            $uplodPath = 'uploads/products/thumbnail/'.$image_name;
            $updateProduct->update([
                'product_thambnail' => $uplodPath,
                'updated_at' => Carbon::now(),
            ]);
            $notification=array(
                'message'=>'Product Thambnail Update Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('product.view')->with($notification);
        }
    }

    // Multiple image update
    public function ProductMultipleImageUpdate(Request $request){
        $imgs = $request->multiImg;

        // return $request->all();
        foreach ($imgs as $id => $img) {
            $imgDel = MultipleImage::findOrFail($id);
            unlink($imgDel->photo_name);
            $make_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('uploads/products/multiple_image/'.$make_name);
            $uplodPath = 'uploads/products/multiple_image/'.$make_name;

            MultipleImage::where('id',$id)->update([
            'photo_name' => $uplodPath,
            'updated_at' => Carbon::now(),
           ]);

        }

        $notification=array(
            'message'=>'Product Image Update Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    // Delete product multiple image
    public function ProductImageDelete($id){
        $multiImage = MultipleImage::findOrFail($id);
        unlink($multiImage->photo_name);
        $multiImage->delete();
        $notification=array(
         'message'=>'Product Image Deleted Successfully',
         'alert-type'=>'success'
     );
     return Redirect()->back()->with($notification);
    }

    // Delete product
    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        $product->delete();

        $multiImages = MultipleImage::where('product_id',$id)->get();
        foreach ($multiImages as $image){
            unlink($image->photo_name);
            MultipleImage::where('product_id',$id)->delete();
        }
    
        $notification=array(
         'message'=>'Product Deleted Successfully',
         'alert-type'=>'success'
     );
     return Redirect()->back()->with($notification);
    }

    //product Active
    public function ProductInactive($id){
        $product = Product::findOrFail($id);
        $product->update([
            'status'=>0
        ]);
        $notification=array(
         'message'=>'Product Inactivated Successfully',
         'alert-type'=>'success'
     );
     return Redirect()->back()->with($notification);
    }
    //product Inactive
    public function ProductActive($id){
        $product = Product::findOrFail($id);
        $product->update([
            'status'=>1
        ]);
        $notification=array(
         'message'=>'Product Activated Successfully',
         'alert-type'=>'success'
     );
     return Redirect()->back()->with($notification);
    }
}