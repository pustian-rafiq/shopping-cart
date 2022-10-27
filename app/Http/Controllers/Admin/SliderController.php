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
       
            // Retrieve the validated input data...
            // $validated = $request->validated();
            //  return $request;

           
            try{
                // $data =[];

                $data['title_en'] = $request->title_en;
                $data['title_bn'] = $request->title_bn;
                $data['description_en'] = $request->title_en;
                $data['description_bn'] = $request->description_bn;
    
                if($file = $request->file('slider_image')){
                    $fileData = $this->uploadFile($file, 'uploads/slider/');
                    $data["slider_image"] = $fileData['filePath'];
                }
                // return $data;
                // $this->slider->action('post', $data);
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
}