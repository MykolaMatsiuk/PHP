<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Item;

class CategoryController extends Controller
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
        $categories = Category::paginate(5);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
        ]);

        $category = new Category;
        $category->name = $request->category;
        $category->save();

        return redirect('/admin/categories')->with('status', 'Категорію створено!');
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
        $category = Category::where('id', $id)->first();

        return view('admin.categories.edit', compact('category'));
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
            'title' => 'required',
        ]);

        $category = Category::find($id);
        $category->name = $request->title;
        $category->save();

        return redirect('/admin/categories')->with('status', 'Категорію оновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currentCategory = Category::findOrFail($id);

        $items = Item::all();

        $currentItems = [];
        foreach ($items as $key => $value) {
            if ($value->category_id == $id) {
                $currentItems[$key] = $value;
            }
        }

        $images = [];
        foreach ($currentItems as $key => $value) {
            $images[$key] = $value->images()->get();
        }
        
        foreach ($images as $image) {
            foreach ($image as $img) {
                if (file_exists(public_path($img->src))) {
                    unlink(public_path($img->src));
                }
            }
        }

        $currentCategory->delete();

        return redirect()->back()->with('status', 'Категорію видалено!');
    }
}
