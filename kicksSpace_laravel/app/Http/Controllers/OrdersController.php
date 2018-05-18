<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use JavaScript;
use App\User;
use App\Order;

class OrdersController extends Controller
{
    public function index()
    {
        if (!Auth::user()) return null;
        $id = Auth::user()->id;
        // $orders = Order::where('user_id', $id)
        //     ->with('items')
        //     ->get();
        // $chosenItems = DB::table('item_order')->get();

        $orders = Order::where('user_id', $id)
            ->with('items')
            ->leftJoin('item_order', 'orders.id', '=', 'item_order.order_id')
            ->leftJoin('items', 'items.id', '=', 'item_order.item_id')
            ->select('orders.id', 'orders.user_id', 'items.name', 'items.model', 'item_order.size', 'orders.status', 'orders.total', 'orders.created_at', 'items.price')
            ->get();
        // $new_orders = [];
        // foreach ($orders as $order) {
        //     foreach ($order->items as $key => $value) {
        //         $items['chosenSize'] = $order->size;
        //     }
        // }
        // foreach ($orders as $key => $item) {
        //     $new_orders[$item['id']][$key] = $item;
        // }

        // $json  = json_encode($new_orders);
        // $array = json_decode($json, true);
        // dd($array);
        // foreach ($new_orders as $order) {
        //     array
        // }
        return view('orders.index', compact('orders'));   
    }
}
