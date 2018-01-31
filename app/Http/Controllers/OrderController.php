<?php

namespace App\Http\Controllers;

use App\Card;
use App\Company;
use App\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Excel;
use Carbon\Carbon;

class OrderController extends Controller
{

    public function orderView($id)
    {
        $order = Order::find($id);
        $quantity = $order->quantities;
        $cards = Card::find($order->items);

        return View('dashboard.orderView', compact('order', 'cards', 'quantity'));
    }


    public function orderProcessing($id)
    {
        $order = Order::find($id);
        $order->status = 'Processing';
        $order->update();

        return redirect('/dashboard/order/view/' . $id);
    }

    public function orderProcessed($id)
    {
        $order = Order::find($id);
        $order->status = 'Done';
        $order->update();

        return redirect('/dashboard/order/view/' . $id);
    }

    public function ordersCsvView()
    {
        $orders = Order::all();
        foreach ($orders as $transaction) {
            $arr = '| ';
            foreach ($transaction['items'] as $key => $item) {
                $arr = $arr . Card::find($item)['name'] . ' x ' . $transaction['quantities'][$key] . ' | ';
                $transaction['cards'] = $arr;
            }
            $transaction['items'] = serialize($transaction['items']);
            $transaction['quantities'] = serialize($transaction['quantities']);
        }
        return View('dashboard.orderCsv', compact('orders'));
    }


    public function ordersCsv(Request $request)
    {

        $now = Carbon::now();
        $now = Carbon::parse($now);
        $to = Carbon::parse($request->to);
        $from = Carbon::parse($request->from);
        $name = $now . 'transactionExcel';
        if ($request->type) {
            $transactions = Order::where('status', '!=', 'uncompleted')
                ->where('type', '=', $request->type)->get();
        } else {
            $transactions = Order::where('status', '!=', 'uncompleted')->get();
        }

        if (Input::get('submit') == 'Export According Time') {

            if ($request->type) {
                $transactions = Order::where('created_at', '>=', $from)
                    ->where('created_at', '<=', $to)
                    ->where('type', '=', $request->type)
                    ->where('status', '!=', 'uncompleted')
                    ->get();
            } else {
                $transactions = Order::where('created_at', '>=', $from)
                    ->where('created_at', '<=', $to)
                    ->where('status', '!=', 'uncompleted')
                    ->get();
            }
            if ($transactions->count() == 0)
                return redirect('/dashboard/orders/csv')
                    ->with('message', 'لا يوجد حوالات بين الفترات المختارة');
        }

        foreach ($transactions as $transaction) {
            $arr = '| ';
            foreach ($transaction['items'] as $key => $item) {
                $arr = $arr . Card::find($item)['name'] . ' x ' . $transaction['quantities'][$key] . ' | ';
                $transaction['cards'] = $arr;
            }
            $transaction['items'] = serialize($transaction['items']);
            $transaction['quantities'] = serialize($transaction['quantities']);
        }

        return Excel::create($name, function ($excel) use ($transactions) {
            $excel->sheet('mysheet', function ($sheet) use ($transactions) {
                $sheet->fromArray($transactions);
            });
        })->download('xls');
        return redirect('/dashboard');

    }

}
