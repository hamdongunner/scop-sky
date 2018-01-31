<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
}
