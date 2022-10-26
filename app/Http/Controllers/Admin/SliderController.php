<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
        //view slider page
        public function index(){
            $sliders = Slider::latest()->get();
            return view('admin.slider.index', compact('sliders'));
        }
}
