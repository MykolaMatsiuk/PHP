<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Comment;
use App\Category;
use App\User;
use App\Vote;

class AjaxController extends Controller
{
    public function getItems()
    {
        $items = Item::with('images', 'sizes')->get();

        return response()->json($items);
    }

    public function getComments(Request $request)
    {
        $item_id = $request->get('item_id');

        $comments = Comment::with('user')->where('item_id', $item_id)->get();

        return response()->json($comments);
    }

    public function getCategories()
    {
        $categories = Category::get();

        return response()->json($categories);
    }

    public function upVote(Request $request)
    {
        if (!Auth::user()) {
            $data = 'зареєструйся!';
            return response()->json($data);
        };

        $commId = $request->get('id');
        $comment = Comment::find($commId);
        $user = Auth::user();
        $user->upVote($comment);

        $upVoters = Vote::where('votable_id', $commId)->where('type', 'up_vote')->count();
        $downVoters = Vote::where('votable_id', $commId)->where('type', 'down_vote')->count();

        // // insert votes to comments table
        $comment->votes_up = $upVoters;
        $comment->votes_down = $downVoters;
        $comment->save();

        $no = "";
        return response()->json($no);
    }

    public function downVote(Request $request)
    {
        if (!Auth::user()) {
            $data = 'зареєструйся!';
            return response()->json($data);
        };
        
        $commId = $request->get('id');
        $comment = Comment::find($commId);
        $user = Auth::user();
        $user->downVote($comment);

        $upVoters = Vote::where('votable_id', $commId)->where('type', 'up_vote')->count();
        $downVoters = Vote::where('votable_id', $commId)->where('type', 'down_vote')->count();

        // // insert votes to comments table
        $comment->votes_up = $upVoters;
        $comment->votes_down = $downVoters;
        $comment->save();

        $no = "";
        return response()->json($no);
    }
}
