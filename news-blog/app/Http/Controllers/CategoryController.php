<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\News;
use App\Comment;
use App\User;
use App\Tag;

class CategoryController extends Controller
{
    public function index()
    {        
        $categories = Category::with(['news' => function ($query) {
            $query->latest();
        }])->get();

        $comments = Comment::select('user_id')
            ->groupBy('user_id')
            ->selectRaw('count(user_id) as comment_count')
            ->orderBy('comment_count', 'desc')
            ->limit(5)
            ->get();

        $new = new News;
        $topNews = $new->getThreeTopNews();

        $tags = Tag::get();

        $news = News::limit(4)->latest()->get();
        $first = $news[0];
        $second = $news[1];
        $third = $news[2];
        $fourth = $news[3];

        return view('welcome', compact('categories', 'first', 'second',
            'third', 'fourth', 'comments', 'topNews', 'tags'));
    }

    public function show(Category $category)
    {
        $name = $category->title;
        $categoryId = $category->id;
        $news = News::where('category_id', $categoryId)->paginate(5);
        return view('categories.show', compact('news', 'name', 'categoryId'));
    }
}
