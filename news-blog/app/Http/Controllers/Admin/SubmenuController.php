<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Navsubmenu;
use App\Navmenu;

class SubmenuController extends Controller
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
        $items = Navsubmenu::with('navmenu')->paginate(5);

        return view('admin.submenu.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentItems = Navmenu::pluck('title', 'id');

        return view('admin.submenu.create', compact('parentItems'));
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
            'title' => 'required',
        ]);

        $item = new Navsubmenu;
        $item->title = $request->title;
        $item->navmenu_id = $request->parent_item;
        $item->save();

        return redirect('/admin/submenu')
            ->with('status', 'Новий елемент підменю створено!');
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
        $item = Navsubmenu::with('navmenu')->where('id', $id)->first();

        $parentItems = Navmenu::all();

        return view('admin.submenu.edit', compact('item', 'parentItems'));
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

        $item = Navsubmenu::find($id);
        $item->title = $request->title;
        $item->navmenu_id = $request->parent_item;
        $item->save();

        return redirect('/admin/submenu')->with('status', 'Елемент підменю оновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Navsubmenu::where('id', $id)->delete();

        return redirect()->back()->with('status', 'Елемент підменю видалено!');
    }
}
