<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate(request(), ['body' => 'required|min:3']);

        Comment::create([
            'body' => request('body'),
            'item_id' => request('item_id'),
            'user_id' => Auth::user()->id
        ]);

        return back();
    }
}
