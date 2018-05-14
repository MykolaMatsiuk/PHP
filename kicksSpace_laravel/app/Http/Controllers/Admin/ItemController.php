<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Category;
use App\Tag;
use App\Image;
use App\Size;

class ItemController extends Controller
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
        $items = Item::with('category', 'tags', 'sizes')->paginate(5);

        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        $sizes = Size::pluck('size', 'id');

        return view('admin.items.create', compact('categories', 'tags', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request->toArray());
        $this->validate($request, [
            'name' => 'required',
            'model' => 'required',
            'size' => 'required',
            'tag_id' => 'required',
            'image' => 'required',
            'image.*' => 'image',
            'description' => 'required',
            'price' => 'required|numeric|between:0,99999',
            'weight' => 'required|numeric|between:0,99999'
        ]);

        $item = new Item;
        $item->name = $request->name;
        $item->model = $request->model;
        $item->description = $request->description;
        $item->category_id = $request->category_id;
        $item->price = $request->price;
        $item->weight = $request->weight;
        $item->save();
        $item->tags()->sync($request->tag_id);
        $item->sizes()->sync($request->size);

        if ($request->hasFile('image')) {
            $images = $request->image;
            foreach ($images as $image) {
                $fileName = $image->store('/images');
                $image = new Image;
                $image->src = $fileName;
                $image->item_id = $item->id;
                $image->save();
            }
        }


        return redirect('/admin/items')->with('status', 'Товар створено!');
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
        $item = Item::where('id', $id)->with('tags', 'sizes')->first();
        $categories = Category::all();
        $tags = Tag::all();
        $sizes = Size::all();

        return view('admin.items.edit', compact('item', 'categories', 'tags', 'tag_id', 'sizes'));
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
        // dd($request->toArray());
        $this->validate($request, [
            'name' => 'required',
            'model' => 'required',
            'size' => 'required',
            'tag_id' => 'required',
            'image.*' => 'image',
            'description' => 'required',
            'price' => 'required|numeric|between:0,99999',
            'weight' => 'required|numeric|between:0,99999'
        ]);

        $item = Item::findOrFail($id);
        $item->name = $request->name;
        $item->model = $request->model;
        $item->description = $request->description;
        $item->category_id = $request->category;
        $item->price = $request->price;
        $item->weight = $request->weight;
        $item->save();
        $item->tags()->sync($request->tag_id);
        $item->sizes()->sync($request->size);

        if ($request->hasFile('image')) {
            $images = $request->image;
            foreach ($images as $image) {
                $fileName = $image->store('/images');
                $image = new Image;
                $image->src = $fileName;
                $image->item_id = $item->id;
                $image->save();
            }
        }


        return redirect('/admin/items')->with('status', 'Товар оновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currentItem = Item::findOrFail($id);

        $images = $currentItem->images()->get();

        foreach ($images as $image) {
            if (file_exists(public_path($image->src))) {
                unlink(public_path($image->src));
            }
        }

        $currentItem->delete();

        return redirect()->back()->with('status', 'Товар видалено!');
    }
}
