<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('items')
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
            ->leftJoin('item_order', 'orders.id', '=', 'item_order.order_id')
            ->leftJoin('items', 'items.id', '=', 'item_order.item_id')
            ->select('orders.*', 'users.name', 'users.email', 'users.tel', 'items.name as title', 'items.model', 'item_order.size', 'items.price')
            ->paginate(5);
        // $chosenItems = DB::table('item_order')->get();

        // foreach ($orders as $order) {
        //     foreach ($order->items as $item) {
        //         foreach ($chosenItems as $chItem) {
        //             if ($order->id === $chItem->order_id && $item->id === $chItem->item_id) {
        //                 $item->chosenSize = $chItem->size;
        //             }
        //         }
        //     }
        // }

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::where('id', $id)->with('items')->first();

        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect('/admin/orders')->with('status', 'Статус замовлення оновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::where('id', $id)->delete();

        return redirect()->back()->with('status', 'Замовлення видалено!');
    }
}
