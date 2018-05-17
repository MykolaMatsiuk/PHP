<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Comment;
use App\Category;
use App\User;
use App\Vote;
use App\Order;

class AjaxController extends Controller
{
    public function getItems()
    {
        $items = Item::with('images', 'sizes')
            ->orderBy('id', 'desc')
            ->limit(20)
            ->get(); //limit 20 //orders 2 tables

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

    public function getAutocompleteResults(Request $request)
    {
        $value = $request->get('input');

        $results = [];

        $items = Item::where('name', 'LIKE', '%' . $value . '%')
              ->orWhere('model', 'LIKE', '%' . $value . '%')->take(10)->get();

        foreach ($items as $item)
        {
            $results[] = [ 'id' => $item->id, 'value' => $item->name ];
        }

        return response()->json($results);
    }

    public function storeComments(Request $request)
    {
        $this->validate(request(), ['body' => 'required|min:3']);

        Comment::create([
            'body' => request('body'),
            'item_id' => request('id'),
            'user_id' => Auth::user()->id
        ]);

        return null;
    }

    public function makeOrder(Request $request)
    {
        $items = json_decode($request->get('items'));
        $total = json_decode($request->get('total'));
        $user = Auth::user();
        $order = $user->orders()->create([
            'total' => $total
        ]); //insert order table data

        // place order and insert data to orders_products
        foreach ($items as $item) {
            $order->items()->attach($item->id,
                ['size' => $item->chosenSize]
            );
        }

        return view('.index');
    }
}
