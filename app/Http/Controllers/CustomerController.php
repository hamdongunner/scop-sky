<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function ftthAddView()
    {
        $companies = Company::all();
        return View('dashboard.ftthAdd',compact('companies'));
    }

    public function ftthAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name'=>'required | unique:customers',
            'password'=>'required|min:6',
            're_password'=>'required|same:password',
            'first_name'=>'required | string',
            'last_name'=>'required | string',
            'phone'=>'required',
            'address'=>'required | string',
            'cabinet_number'=>'required',
            'type'=>'required',
            'company'=>'required',
        ]);

        if ($validator->fails())
            return back()->withErrors($validator->errors())->withInput();

        $company = Company::find($request->company);
        $customer = new Customer;
        $customer->user_name = $request->user_name;
        $customer->password = bcrypt($request->password);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone = $request->phone;
        $customer->company = $company->name;
        $customer->type = $request->type;
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
            'first_name'=>'required | string',
            'last_name'=>'required | string',
            'phone'=>'required',
            'address'=>'required | string',
            'cabinet_number'=>'required',
            'type'=>'required'
        ]);

        if ($validator->fails())
            return back()->withErrors($validator->errors())->withInput();

        $customer = Customer::find($id);
        $customer->user_name = $request->user_name;
        $customer->password = bcrypt($request->password);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone = $request->phone;
        $customer->company_id = $request->company;
        $customer->type = $request->type;
        $customer->address = $request->address;
        $customer->cabinet_number = $request->cabinet_number;
        $customer->update();
        return redirect()->back()->with('message','You Have Been Edited The FTTH Reseller');
    }


}























