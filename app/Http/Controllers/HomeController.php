<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
        session()->flush();
        return View('app.wireless');
    }

    public function checkoutView()
    {
        $items = collect(Session::get('cart'));
        return View('app.checkout',compact('items'));
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
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|exists:customers',
            'password' => 'required'
        ]);

        if ($validator->fails())
            return back()->withErrors($validator->errors())->withInput();
        $cred = $request->only('user_name', 'password');
        if (Auth::guard('app')->attempt($cred, true)) {
            return redirect('/ftth');
        }
        return back()->withErrors(['Wrong Password Or Email'])->withInput();
    }

//----------------------------VUE ROUTES---------------------------------//

    public function getCards()
    {
        return Card::all();
    }


    public function cardAdd($id)
    {
        $card = Card::find($id);
        if(!$card)
            return redirect()->back();

        $bool = true;
        $array = Session::get('cart');
//        return $array;
        try {
            $array[$id]['quantity'] =  $array[$id]['quantity']  + 1;
            if($array[$id]['quantity'] > 1)
                $bool = false;
        } catch (\Exception $e){}

        if($bool)
            $array[$id] = ['id'=>$id,'quantity'=>1,'name'=>$card->name,'type'=>$card->type,'value'=>$card->value];

        session()->put('cart', $array);
//       session(['cart' => $array]);
        return Session::get('cart');

    }


}
