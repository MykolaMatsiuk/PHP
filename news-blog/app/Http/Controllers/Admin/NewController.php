<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\News;
use App\Tag;

class NewController extends Controller
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
        $categories = Category::pluck('title', 'id');
        $news = News::join('categories', 'categories.id', 'news.category_id')
            ->select('news.title as title', 'categories.title as cat_title',
            'news.content', 'news.id',
            'news.pic_src', 'news.created_at', 'news.updated_at')
            ->paginate(5);

        return view('admin.news.index', compact('news', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id');
        $tags = Tag::pluck('title', 'id');
        return view('admin.news.create', compact('categories', 'tags'));
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
            'content' => 'required',
            'image' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $fileName = $request->image->store('/images');
        }

        $news = new News;
        if ($request->analytic) {
            $news->analytic = $request->analytic;
        }
        $news->title = $request->title;
        $news->content = $request->content;
        $news->pic_src = $fileName;
        $news->category_id = $request->category_id;
        $news->save();
        $news->tags()->sync($request->tag_id);

        return redirect('/admin/news/create')->with('status', 'Новину створено!');
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
        $categories = Category::all();
        $new = News::join('categories', 'news.category_id', 'categories.id')
            ->select('news.title', 'news.id', 'news.analytic', 'categories.id as cat_id', 'news.content', 'news.pic_src',
            'categories.title as cat_title')
            ->where('news.id', $id)->first();
        // $new = News::with('tags')->where('id', $id)->first();
        // return $new;

        $tags = Tag::all();

        return view('admin.news.edit', compact('new', 'categories', 'tags'));
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
            'content' => 'required',
            'image' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $fileName = $request->image->store('/images');
        }

        $news = News::find($id);
        if ($request->analytic) {
            $news->analytic = $request->analytic;
        }
        $news->title = $request->title;
        $news->content = $request->content;
        $news->pic_src = $fileName;
        $news->category_id = $request->category;
        $news->tags()->sync($request->tag_id);
        $news->save();

        return redirect('/admin/news')->with('status', 'Новину оновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::where('id', $id)->delete();

        return redirect()->back()->with('status', 'Новину видалено!');
    }
}
