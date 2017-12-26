<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        $order = new Order;
        $order->shifts = [1,2,3];
        $order->save();
        return $order;
    }

    public function get()
    {
        $order = Order::first();
        return $order->items;
    }
}
