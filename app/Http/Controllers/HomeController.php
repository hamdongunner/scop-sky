<?php

namespace App\Http\Controllers;

use App\Card;
use App\Company;
use App\Order;
use App\Wireless;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

    private $transactionInitURL = 'https://api.zaincash.iq/transaction/init';
    private $transactionRedirectURL = 'https://api.zaincash.iq/transaction/pay?id=';


    public function index($lang = 'ar-KW')
    {
        App::setLocale($lang);
        session(['language' => $lang]);
        return view('app.index');
    }

    public function getWirelessView()
    {
        $lang = 'ar-KW';
        $lang = session()->get('language');
        App::setLocale($lang);
        $wireless = Wireless::all();
        $companies = Company::all();
        return View('app.wireless', compact('wireless', 'companies'));
    }


    public function getFtthView()
    {
        $lang = 'ar-KW';
        $lang = session()->get('language');
        App::setLocale($lang);
        return View('app.ftth');
    }

    public function loginView()
    {
        $lang = 'ar-KW';
        $lang = session()->get('language');
        App::setLocale($lang);

        if (Auth::guard('app'))
            return redirect('ftth');
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


    public function checkoutFtthView()
    {
        $lang = 'ar-KW';
        $lang = session()->get('language');
        App::setLocale($lang);

        $items = collect(Session::get('cart'));
        $amount = 0;
        foreach ($items as $item) {
            $amount = $amount + $item['value'] * $item['quantity'];
        }
        if($amount <= 0)
            return redirect()->back();
        return View('app.ftthCheckout', compact('items', 'amount', 'IQD'));
    }

    public function checkoutView()
    {
        $lang = 'ar-KW';
        $lang = session()->get('language');
        App::setLocale($lang);

        $amount = 0;
        $price = Session::get('price');
        if ($amount == 0)
            return redirect()->back()->with('message', 'السلة فارغ ');
        return View('app.checkout', compact('price', 'amount'));
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
        if ($amount == 0)
            return redirect()->back()->with('message', 'السلة فارغ ');
        $order = new Order;
        $order->items = $items;
        $order->quantities = $quantities;
        $order->amount = $amount;
        $order->type = 'FTTH';
        $order->user_id = 0;
//        if (!Auth::guard('app')->check()){
        $order->user_id = Auth::guard('app')->user()->id;
        $order->company_id = Auth::guard('app')->user()->company_id;
//        }
        $order->status = 'new';
        $order->save();
        session()->flush();
        $this->charge(250, 'ScopeSky', $order->id);

    }


    public function checkoutWireless(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company' => 'required',
            'value' => 'required',
        ]);

        if ($validator->fails())
            return back()->withErrors($validator->errors())->withInput();


        $items = [];
        $quantities = [];
        $order = new Order;
        $order->items = $items;
        $order->quantities = $quantities;
        $order->amount = $request->value;
        $order->type = 'WIRELESS';
        $order->user_id = 0;
        if (!Auth::guard('app')->check())
            $order->user_id = Auth::user()->id;
        $order->company_id = $request->company;
        $order->status = 'uncompleted';
        $order->save();
        session()->flush();

        $this->charge(250, 'ScopeSky',$order->id);
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
            'integrationUrl' => 'http://localhost:8000/redirect',
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
        $lang = 'ar-KW';
        $lang = session()->get('language');
        App::setLocale($lang);

        return View('app.done');
        session()->flush();
        if (isset($_GET['token'])) {
            $result = $this->decode($_GET['token']);
            if ($result['status'] == 'success') {
                $order = Order::find($result['orderid']);
                $order->msisdn = $result['msisdn'];
                $order->status = 'new';
                $order->save();
                return View('app.done');
            } else {
                return View('app.fail');
            }
        }
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

        return Card::all();
    }


    public function cardAdd($id)
    {
        $card = Card::findOrFail($id);

//        session()->flush();
        $bool = true;
        $array = Session::get('cart');

        try {
            $array[$id]['quantity'] = $array[$id]['quantity'] + 1;
            if ($array[$id]['quantity'] > 1)
                $bool = false;
        } catch (\Exception $e) {
        }

        if ($bool)
            $array[$id] = ['id' => $id,
                'quantity' => 1,
                'name' => $card->name,
                'type' => $card->type,
                'value' => $card->value,
                'image' => $card->image];

        session()->put('cart', $array);
        return Session::get('cart');

    }

    public function cardDelete($id)
    {
        $card = Card::findOrFail($id);
//        session()->flush();
        $bool = false;
        $array = Session::get('cart');
        try {
            $array[$id]['quantity'] = $array[$id]['quantity'] - 1;
            if ($array[$id]['quantity'] < 1)
                $bool = true;
        } catch (\Exception $e) {
        }

        if ($bool) {
            $array = collect($array);
            $array->forget($id);
            $array = $array->toArray();
        }
        session()->put('cart', $array);
        return Session::get('cart');
    }

    public function getCompanies()
    {
        return Company::all();
    }

    public function getCartCount()
    {
        $count = 0;
        $carts = null;
        $carts = Session::get('cart');

        if ($carts) {
            foreach ($carts as $cart) {
                $count = $count + $cart['quantity'];
            }
        }
        return ['count' => $count, 'carts' => $carts];
    }


}
