<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashController extends Controller
{
    public function index()
    {
        return View('dashboard.index');
    }

    public function cards()
    {
        return View('dashboard.cards');
    }

    public function orders()
    {
        return View('dashboard.orders');
    }

    public function companies()
    {
        return View('dashboard.companies');
    }

    public function ftth()
    {
        return View('dashboard.ftth');
    }

    public function authView()
    {
        if (Auth::guard('web')->check())
            return redirect('/dashboard');
        return View('dashboard.login');
    }

    public function authAdmin(Request $request)
    {
        if (Auth::guard('web')->check())
            return redirect('/dashboard');
        $validator = Validator::make($request->all(),[
            'email'=>'required|email|exists:users',
            'password'=>'required'
        ]);

        if($validator->fails())
            return back()->withErrors($validator->errors())->withInput();
        $cred = $request->only('email','password');
        if(Auth::guard('web')->attempt($cred,true))
        {
//            return Auth::user();
            return redirect('/dashboard');
        }
        return back()->withErrors(['Wrong Password Or Email'])->withInput();
    }
}
