<?php

namespace App\Http\Controllers;

use App\Card;
use App\Company;
use App\Customer;
use App\Order;
use App\User;
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
        $cards = Card::all();
        return View('dashboard.cards', compact('cards'));
    }

    public function orders()
    {
        $orders = Order::all();
        foreach ($orders as $transaction){
            $arr = '| ';
            foreach ($transaction['items'] as $key=>$item){
                $arr = $arr .  Card::find($item)['name'] .' x '.$transaction['quantities'][$key].' | ';
                $transaction['cards'] = $arr;
            }
            $transaction['items'] = serialize($transaction['items']);
            $transaction['quantities'] = serialize($transaction['quantities']);
        }
        return View('dashboard.orders', compact('orders'));
    }

    public function companies()
    {
        $companies = Company::all();
        return View('dashboard.companies', compact('companies'));
    }

    public function ftth()
    {
        $customers = Customer::all();
        return View('dashboard.ftth', compact('customers'));
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
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        if ($validator->fails())
            return back()->withErrors($validator->errors())->withInput();
        $cred = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($cred, true)) {
//            return Auth::user();
            return redirect('/dashboard');
        }
        return back()->withErrors(['Wrong Password Or Email'])->withInput();
    }

    public function admins()
    {
        $admins = User::all();
        return View('dashboard.admins', compact('admins'));
    }

    public function adminDelete($id)
    {
        $users = User::all();
        if ($id == Auth::user()->id || $users->count() == 1)
            return redirect()->back()->with('message', 'Can\'t Delete This Admin');
        User::find($id)->delete();
        return redirect()->back();
    }

    public function adminAddView()
    {
        return View('dashboard.adminAdd');
    }

    public function adminAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required | unique:users',
            'name'=>'required',
            'password'=>'required|min:6',
            're_password'=>'required|same:password',
            'is_admin'=>'required',
        ]);

        if ($validator->fails())
            return back()->withErrors($validator->errors())->withInput();
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with('message','You Have Been Added a New Admin');
    }


    public function adminEditView($id)
    {
        $admin = User::find($id);
        return View('dashboard.adminEdit',compact('admin'));
    }

    public function adminEdit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required',
            'name'=>'required',
            'password'=>'required|min:6',
            're_password'=>'required|same:password',
            'is_admin'=>'required',
        ]);

        if ($validator->fails())
            return back()->withErrors($validator->errors())->withInput();
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;
        $user->password = bcrypt($request->password);
        $user->update();
        return redirect()->back()->with('message','You Have Been Edited The Admin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/auth');
    }
}
