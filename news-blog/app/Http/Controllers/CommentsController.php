<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Category;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Category $category, News $news)
    {
        $this->validate(request(), ['body' => 'required|min:3']);

        Comment::create([
            'body' => request('body'),
            'news_id' => $news->id,
            'user_id' => Auth::user()->id
        ]);

        return back();
    }

    public function index(User $user)
    {
        $comments = Comment::where('user_id', $user->id)->paginate(5);

        return view('comments.index', compact('comments', 'user'));
    }
}
