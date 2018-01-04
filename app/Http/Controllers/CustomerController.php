<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function ftthAddView()
    {
        $customer = Customer::all();
        return View('dashboard.ftthAdd');
    }

    public function ftthAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name'=>'required | unique:customers',
            'password'=>'required|min:6',
            're_password'=>'required|same:password',
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'cabinet_number'=>'required',
        ]);

        if ($validator->fails())
            return back()->withErrors($validator->errors())->withInput();

        $customer = new Customer;
        $customer->user_name = $request->user_name;
        $customer->password = bcrypt($request->password);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->cabinet_number = $request->cabinet_number;
        $customer->save();
        return redirect()->back()->with('message','You Have Been Added a New FTTH Reseller');
    }

    public function ftthDelete($id)
    {
        Customer::find($id)->delete();
        return redirect()->back();
    }

    public function ftthEditView($id)
    {
        $customer = Customer::find($id);
        return View('dashboard.ftthEdit',compact('customer'));
    }

    public function ftthEdit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_name'=>'required',
            'password'=>'required|min:6',
            're_password'=>'required|same:password',
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'cabinet_number'=>'required',
        ]);

        if ($validator->fails())
            return back()->withErrors($validator->errors())->withInput();

        $customer = Customer::find($id);
        $customer->user_name = $request->user_name;
        $customer->password = bcrypt($request->password);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->cabinet_number = $request->cabinet_number;
        $customer->update();
        return redirect()->back()->with('message','You Have Been Edited The FTTH Reseller');
    }
}























