<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    //English Language
    public function EnglishLanguage(){
        session()->get('language');
        session()->forget('language');

        Session::put('language','english');

        return Redirect()->back();
    }
    //Bangla Language
    public function BanglaLanguage(){
        session()->get('language');
        session()->forget('language');

        Session::put('language','bangla');

        return Redirect()->back();
    }
}