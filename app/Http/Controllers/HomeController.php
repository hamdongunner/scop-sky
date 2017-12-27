<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Faker\Factory as Faker;

class HomeController extends Controller
{
    public function index()
    {
        return view('app.index');
    }

    public function getWirelessView()
    {
        return View('app.wireless');
    }

    public function getFtthView()
    {
        return View('app.ftth');
    }

    public function loginView()
    {
        return View('app.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>'required|email|exists:users',
            'password'=>'required'
        ]);

        if($validator->fails())
            return back()->withErrors($validator->errors())->withInput();
        $cred = $request->only('email','password');
        if(Auth::guard('admin')->attempt($cred,true))
        {
//            return Auth::user();
            return redirect('/ftth');
        }
        return back()->withErrors(['Wrong Password Or Email'])->withInput();
    }
}
