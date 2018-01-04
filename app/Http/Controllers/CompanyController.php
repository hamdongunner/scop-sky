<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{

    public function companyAddView()
    {
       return View('dashboard.companyAdd');
    }

    public function companyDelete($id)
    {
        Company::find($id)->delete();
        return redirect()->back();
    }

    public function companyAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails())
            return back()->withErrors($validator->errors())->withInput();

        $company = new Company;
        $company->name = $request->name;
        $company->address = $request->address;
        $company->save();

        return redirect()->back()->with('message','The Company has been added');
    }

    public function companyEditView($id)
    {
        $company = Company::find($id);
        return View('dashboard.companyEdit',compact('company'));
    }

    public function companyEdit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails())
            return back()->withErrors($validator->errors())->withInput();

        $company = Company::find($id);
        $company->name = $request->name;
        $company->address = $request->address;
        $company->update();

        return redirect()->back()->with('message','The Company has been Edited');
    }
}
