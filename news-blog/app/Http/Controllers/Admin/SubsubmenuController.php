<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Freepaper;
use App\Navsubmenu;

class SubsubmenuController extends Controller
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
        $items = Freepaper::with('navsubmenu')->paginate(5);

        return view('admin.subsubmenu.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentItems = Navsubmenu::pluck('title', 'id');

        return view('admin.subsubmenu.create', compact('parentItems'));
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

        $item = new Freepaper;
        $item->title = $request->title;
        $item->navsubmenu_id = $request->parent_item;
        $item->save();

        return redirect('/admin/subsubmenu')
            ->with('status', 'Новий елемент підпідменю створено!');
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
        $item = Freepaper::with('navsubmenu')->where('id', $id)->first();

        $parentItems = Navsubmenu::all();

        return view('admin.subsubmenu.edit', compact('item', 'parentItems'));
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

        $item = Freepaper::find($id);
        $item->title = $request->title;
        $item->navsubmenu_id = $request->parent_item;
        $item->save();

        return redirect('/admin/subsubmenu')->with('status', 'Елемент підпідменю оновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Freepaper::where('id', $id)->delete();

        return redirect()->back()->with('status', 'Елемент підпідменю видалено!');
    }
}
