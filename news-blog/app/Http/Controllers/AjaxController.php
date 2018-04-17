<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tag;
use App\Vote;
use App\News;
use App\Comment;
use App\Commercial;

class AjaxController extends Controller
{
    
    public function getViewers()
    {
        $viewersNow = rand(0, 5);
        return response()->json($viewersNow);
    }

    public function getTags()
    {
        $tags = Tag::get();
        return response()->json($tags);
    }
    
    public function getVotes(Request $request)
    {
        $commId = $request->get('commId');
        $arrUp = [];
        foreach ($commId as $key => $value) {
            $arrUp[$value] = Vote::where('votable_id', $value)->where('type', 'up_vote')->count();
        }
        $arrDown = [];
        foreach ($commId as $key => $value) {
            $arrDown[$value] = Vote::where('votable_id', $value)->where('type', 'down_vote')->count();
        }
        // $votesUp = Vote::where('votable_id', $commId)->where('type', 'up_vote')->count();
        // $votesDown = Vote::where('votable_id', $commId)->where('type', 'down_vote')->count();

        $result = [
            'up' => $arrUp,
            'down' => $arrDown
        ];

        return response()->json($result);
    }

    public function upVote(Request $request)
    {
        if (!Auth::check()) {
            return null;
        };
        $commId = $request->get('commId');
        $comment = Comment::find($commId);
        $user = Auth::user();
        $user->upVote($comment);


        $votesUp = Vote::where('votable_id', $commId)->where('type', 'up_vote')->count();
        $votesDown = Vote::where('votable_id', $commId)->where('type', 'down_vote')->count();

        // insert upVotes to database
        $comment->votes_up = $votesUp;
        $comment->save();

        $result = [
            'up' => $votesUp,
            'down' => $votesDown
        ];

        return response()->json($result);
    }

    public function downVote(Request $request)
    {
        if (!Auth::check()) {
            return null;
        };
        $commId = $request->get('commId');
        $comment = Comment::find($commId);
        $user = Auth::user();
        $user->downVote($comment);

        $votesUp = Vote::where('votable_id', $commId)->where('type', 'up_vote')->count();
        $votesDown = Vote::where('votable_id', $commId)->where('type', 'down_vote')->count();

        // insert upVotes to database
        $comment->votes_up = $votesUp;
        $comment->save();

        $result = [
            'up' => $votesUp,
            'down' => $votesDown
        ];

        return response()->json($result);
    }

    public function getCommercial()
    {
        $result = Commercial::orderByRaw('RAND()')->take(4)->get();

        return response()->json($result);
    }
}
