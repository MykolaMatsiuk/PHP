<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\News;
use App\Tag;

class TagController extends Controller
{
    public function getNews(Category $category, News $news, Tag $tag)
    {
        $news = $tag->news()->paginate(5);
        return view('news.tags', compact('tag', 'category', 'news'));
    }
}
