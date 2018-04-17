<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Commercial;

class CommercialController extends Controller
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
        $commercials = Commercial::paginate(5);

        return view('admin.commercials.index', compact('commercials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.commercials.create');
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
            'company' => 'required',
            'price' => 'required|numeric|between:0,999.99'
        ]);

        $com = new Commercial;
        $com->title = $request->title;
        $com->company = $request->company;
        $com->price = $request->price;
        $com->save();

        return redirect('/admin/commercials/create')->with('status', 'Рекламу створено!');
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
        $commercial = Commercial::where('id', $id)->first();

        return view('admin.commercials.edit', compact('commercial'));
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
            'price' => 'required|numeric|between:0,999.99',
            'company' => 'required'
        ]);

        $commercial = Commercial::find($id);
        $commercial->title = $request->title;
        $commercial->price = $request->price;
        $commercial->company = $request->company;
        $commercial->save();

        return redirect('/admin/commercials')->with('status', 'Рекламу оновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Commercial::where('id', $id)->delete();

        return redirect()->back()->with('status', 'Рекламу видалено!');
    }
}
