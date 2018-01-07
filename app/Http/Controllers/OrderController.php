<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function orderView($id)
    {
        $order = Order::find($id);
        return View('dashboard.orderView');
    }

}
