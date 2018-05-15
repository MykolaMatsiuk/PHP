<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JavaScript;
use App\Order;

class CartController extends Controller
{
    public function index(Request $request)
    {
        (Auth::user()) ? $user = Auth::user() : $user = null;

        JavaScript::put([ 'user' => $user ]);

        return view('cart.index');
    }

    public function checkout()
    {
        return Order::createOrder();
    }
}
