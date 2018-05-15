<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use JavaScript;

class SearchController extends Controller
{
    public function search(Request $request, Item $items)
    {
        $items = $items->newQuery();
        $search = $request->input('search');

        if ($search) {
            $items->where('name', 'LIKE', '%' . $search . '%')
                  ->orWhere('model', 'LIKE', '%' . $search . '%')
                  ->orWhere('description', 'LIKE', '%' . $search . '%');
        } else {
            return redirect()->back();
        }

        $items = $items->with('images', 'sizes')->get();

        if (!count($items)) {
            $items = Item::with('images', 'sizes')->get();
        }

        JavaScript::put(['searchItems' => $items]);        

        return view('items.index');
    }
}
