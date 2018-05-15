<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;
use JavaScript;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $items = Item::with('images', 'sizes')
            ->where('category_id', $category->id)
            ->get();

        $catName = $category->name;

        JavaScript::put(['itemsCat' => $items, 'name' => $catName]);

        return view('items.index');
    }
}
