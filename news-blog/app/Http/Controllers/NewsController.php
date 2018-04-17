<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\News;
use JavaScript;
use App\Comment;

class NewsController extends Controller
{
    public function index(Category $category, News $news)
    {
        // JavaScript::put([
        //     'news_id' => $news->id
        // ]);
        $comments = Comment::orderBy('votes_up', 'desc')->where('news_id', $news->id)->get();
        return view('news.index', compact('news', 'category', 'comments'));
    }
}
