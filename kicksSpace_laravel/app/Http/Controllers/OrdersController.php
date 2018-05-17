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
        $orders = Order::where('user_id', $id)
            ->with('items')
            ->get();
        $chosenItems = DB::table('item_order')->get();

        foreach ($orders as $order) {
            foreach ($order->items as $item) {
                foreach ($chosenItems as $chItem) {
                    if ($order->id === $chItem->order_id && $item->id === $chItem->item_id) {
                        $item->chosenSize = $chItem->size;
                    }
                }
            }
        }
        
        return view('orders.index', compact('orders'));   
    }
}
