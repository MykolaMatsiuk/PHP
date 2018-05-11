<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use JavaScript;

class ItemsController extends Controller
{
    public function index()
    {

        // $items = Item::all();

        return view('items.index');
    }

    public function show(Item $item)
    {
        Auth::user() ? $user = Auth::user() : $user = null;

        $item = $item->with('images', 'sizes')->find($item->id);

        JavaScript::put([ 'item' => $item, 'user' => $user ]);

        return view('items.show', compact('item'));
    }
}
