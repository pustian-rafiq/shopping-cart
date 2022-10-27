<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\SliderPostRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use App\Traits\Media;
use App\Crud\Crud;


class SliderController extends Controller
{
    use Media;

    public function __construct()
    {
        $this->slider = new Crud(Slider::class);
        // $this->organization = new Crud(Organization::class);
        // $this->middleware('role:Admin', ['only' => ['organization', 'organizationUpdate', 'environmentalInformation', 'environmentalInformationUpdate']]);
    }
    //view slider page
    public function index(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    //view slider add page
     public function SliderAdd(){
        return view('admin.slider.create');
    }

     //Store new slider
     public function SliderStore(SliderPostRequest $request){

            try{

                $data['title_en'] = $request->title_en;
                $data['title_bn'] = $request->title_bn;
                $data['description_en'] = $request->description_en;
                $data['description_bn'] = $request->description_bn;
    
                if($file = $request->file('slider_image')){
                    $fileData = $this->uploadFile($file, 'uploads/slider/');
                    $data["slider_image"] = $fileData['filePath'];
                }

                Slider::create($data);
    
                $notification=array(
                    'message'=>'Slider Added Successfully',
                    'alert-type'=>'success'
                );
                return Redirect()->route('slider.view')->with($notification);
            }catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }  
       }

   //view slider edit page
    public function SliderEdit($id){
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

   //Update slider data
    public function SliderUpdate(Request $request, $id){
       
        $slider = Slider::findOrFail($id);
        $old_image = $request->file('old_image');

        try{

            if($request->file('slider_image')){

                $data['title_en'] = $request->title_en;
                $data['title_bn'] = $request->title_bn;
                $data['description_en'] = $request->description_en;
                $data['description_bn'] = $request->description_bn;

                //Unlink image files
                unlink($old_image);
                //Update image
                $fileData = $this->uploadFile($request->file('slider_image'), 'uploads/slider/');
                $data["slider_image"] = $fileData['filePath'];
           
                $slider->update($data);

                $notification=array(
                    'message'=>'Slider Updated Successfully',
                    'alert-type'=>'success'
                );
                return Redirect()->route('slider.view')->with($notification);
            }else{
                $data['title_en'] = $request->title_en;
                $data['title_bn'] = $request->title_bn;
                $data['description_en'] = $request->description_en;
                $data['description_bn'] = $request->description_bn;

                $slider->update($data);

                $notification=array(
                    'message'=>'Slider updated successfully without image',
                    'alert-type'=>'success'
                );
                return Redirect()->route('slider.view')->with($notification);
              }
          
            }catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }  


        return view('admin.slider.index', compact('sliders'));
    }
   //view slider page
    public function SliderDelete($id){

        $slider = Slider::findOrFail($id);
        $img = $slider->slider_image;
        unlink($img);

        $slider->delete();
        $notification=array(
         'message'=>'Slider Deleted Successfully',
         'alert-type'=>'success'
     );
     return Redirect()->back()->with($notification);
    }
}