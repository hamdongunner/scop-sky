<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index()
    {
        $arabic = Faq::where('lang','ar-KW')->first();
        $english = Faq::where('lang','en-GB')->first();
        return View('dashboard.faq',compact('arabic','english'));
    }

    public function add(Request $request)
    {
        if(!$arabic = Faq::where('lang','ar-KW')->first())
            $arabic = new Faq;
        $arabic->text = $request->arabic;
        $arabic->lang = 'ar-KW';
        $arabic->save();

        if(!$english = Faq::where('lang','en-GB')->first())
            $english = new Faq;
        $english->text = $request->english;
        $english->lang = 'en-GB';
        $english->save();

        return redirect()->back();

    }

    public function view()
    {
        $lang = 'ar-KW';
        $lang = session()->get('language');
        App::setLocale($lang);
        if($lang == 'ku-IQ')
            $lang = 'ar-KW';

        $faq = Faq::where('lang',$lang)->first();
        $d = 'rtl';
        if($lang == 'en-GB')
            $d = 'ltr';
        return View('app.faq',compact('faq','lang','d'));
    }

    public function banners()
    {
        $banner = Banner::first();
        return View('dashboard.banners',compact('banner'));
    }

    public function bannersAdd(Request $request)
    {


        $banner = Banner::first();
        if(!$banner){
            $banner = new Banner;
        }
        $banner->text = $request->text;
        $banner->save();
        return redirect()->back()->with('message','banner has been changed');
    }
}
