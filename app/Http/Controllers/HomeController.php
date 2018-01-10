<?php

namespace App\Http\Controllers;

use App\Card;
use App\Company;
use App\Order;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Faker\Factory as Faker;
use \Exception;
use GuzzleHttp\Client;
use \Firebase\JWT\JWT;
use Symfony\Component\HttpKernel\EventListener\ExceptionListener;

class HomeController extends Controller
{

    private $zcUrl = ""; // api that redirect the user information when i sent the msisdn    //
    private $msisdn;                                                                    //
    private $secret = ""; // use with ZCURL                                                 //
    private $secret2 = ""; // use with the Token that come carry the msisdn from the app     //
    private $zcData = ""; // user information that we will get it from the zcUrl             //
    private $transactionInitURL = 'https://api.zaincash.iq/transaction/init';
    private $transactionRedirectURL = 'https://api.zaincash.iq/transaction/pay?id=';


    public function index()
    {

        return view('app.index');
    }

    public function getWirelessView()
    {
//        session()->flush();
        return View('app.wireless');
    }

    public function checkoutView()
    {
        $company = Session::get('company');
        if(!$company)
            return redirect()->back()->with('message','You Have to choose a Company');
        $items = collect(Session::get('cart'));
        $amount = 0;
        foreach ($items as $item){
           $amount = $amount + $item['value'] * $item['quantity'];
        }
        return View('app.checkout',compact('items','amount'));
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


    public function checkout()
    {
        $cart = collect(Session::get('cart'));
        $amount = 0;
        $items = [];
        $quantities = [];
        $company = Session::get('company');
        foreach ($cart as $item) {
            $items[] = $item['id'];
            $quantities[] = $item['quantity'];
            $amount = $amount + $item['value'] * $item['quantity'];
        }
//        $items = serialize($items);
        $order = new Order;
        $order->items = $items;
        $order->quantities = $quantities;
        $order->amount = $amount;
        $order->user_id = 0;
        if (!Auth::guard('app')->check())
            $order->user_id = Auth::user()->id;
        $order->company_id = $company->id;
        $order->status = 'new';
        $order->save();
        session()->flush();
        $this->charge(250, 'ScopeSky', 'Order_00001');
        return;
    }

//----------------------------PAY INTEGRATION---------------------------------//


    public function charge($amount, $service_type, $order_id)
    {
        //encodes data to JWt token
        $jwt_token = $this->encode($amount, $service_type, $order_id);
        //prepares JWT and other data for http
        $http_context = $this->prepareHttpRequest($jwt_token);
        //sends http request
        $http_response = $this->sendHttpRequest($http_context);
        //handles http response and return redirection url
        $redirect_url = $this->handleHttpResponse($http_response);
        //redirects to redirection url
        $this->redirect($redirect_url);
    }
//===

    private function encode($amount, $service_type, $order_id)
    {
        $secret = $_ENV['ZC_SECRET'];
        $now = new DateTime();
        $payload = [
            'amount' => $amount,
            'serviceType' => $service_type,
            'msisdn' => $_ENV['ZC_MSISDN'],
            'orderId' => $order_id,
            'redirectUrl' => 'http://localhost:8000/redirect',
            'iat' => $now->getTimestamp(),
            'exp' => $now->getTimestamp() + 60 * 60 * 4
        ];
        $token = JWT::encode(
            $payload,      //Data to be encoded in the JWT
            $secret,
            'HS256'
        );
        return $token;
    }
    private function prepareHttpRequest($token)
    {
        $requestBody = [
            'form_params' => [ //this option automatically sets header ': application/x-www-form-urlencoded'
                'token' => urlencode($token), // JWT Token
                'merchantId' => $_ENV['ZC_MERCHANTID'],
                'lang' => 'ar',
            ], 'verify' => false
        ];
        return $requestBody;
    }
    private function sendHttpRequest(array $requestBody)
    {
        $client = new Client();
        $response = $client->request('POST', $this->transactionInitURL, $requestBody);
        if ($response === false || $response === null) throw new Exception("ERROR: Failing to contact api, communication layer issue.");
        return $response->getBody();
    }
    private function handleHttpResponse($response)
    {
        $array = json_decode($response, true);
        if (isset($array['err'])) throw new Exception("ERROR: Transaction request failed (" . $array['err']['msg'] . ")");
        $transaction_id = $array['id'];
        $newurl = $this->transactionRedirectURL . $transaction_id;
        return $newurl;
    }
    private function redirect($url)
    {
        header('Location: ' . $url);
        exit();
    }
    public function checkRedirect()
    {

        if (isset($_GET['token'])) {
            $result = $this->decode($_GET['token']);
            if ($result['status'] == 'success') {
            return 5;
            } else {
             return 6;
            }
        }
        session()->flush();
        return redirect('/');
    }
    public function decode($token)
    {
        $secret = $_ENV['ZC_SECRET'];
        $result = (array)JWT::decode($token, $secret, array('HS256'));
        return $result;
    }


//----------------------------VUE ROUTES---------------------------------//

    public function getCards()
    {
        return Card::where('type','=','Wireless')->get();
    }


    public function cardAdd($id)
    {
        $card = Card::find($id);
        if(!$card)
            return 0;

        $bool = true;
        $array = Session::get('cart');
//        return $array;
        try {
            $array[$id]['quantity'] =  $array[$id]['quantity']  + 1;
            if($array[$id]['quantity'] > 1)
                $bool = false;
        } catch (\Exception $e){}

        if($bool)
            $array[$id] = ['id'=>$id,'quantity'=>1,'name'=>$card->name,'type'=>$card->type,'value'=>$card->value,'image'=>$card->image];

        session()->put('cart', $array);
//       session(['cart' => $array]);
        return Session::get('cart');

    }

    public function companyAdd($id)
    {
        $company = Company::find($id);
        if(!$company)
            return 0;
        session()->put('company', $company);
        return $company;
    }

    public function getCompanies()
    {
        return Company::all();
    }

    public function getCartCount()
    {
        $count = 0;
        $carts = Session::get('cart');
        foreach ($carts as $cart){
            $count = $count + $cart['quantity'];
        }
        return $count;
    }


}
