<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Tag;
use App\Category;
use Illuminate\Support\Carbon;

class SearchController extends Controller
{
    public function filter(Request $request, News $news)
    {
        $news = $news->newQuery();

        // Search for news by date range
        $start = Carbon::parse($request->input('date_from'));
        $end = Carbon::parse($request->input('date_to'));
        if ($request->input('date_from') && $request->input('date_to')) {
            $news->whereBetween('news.created_at', [$start, $end]);
        }

        // Search for news by tag name
        $tags = Tag::get();
        $searchTitles = [];

        foreach ($tags as $tag) {
            $searchTitles[] .= $tag->title;
        }

        $arr = $request->toArray();

        if (array_intersect($searchTitles, $arr)) {
            $news->whereHas('tags', function($q) use ($arr) {
                $q->whereIn('title', $arr);
            });
        };

        // Search for news by category
        $categories = Category::get();
        $searchCatTitles = [];

        foreach ($categories as $category) {
            $searchCatTitles[] .= $category->title;
        }

        if (array_intersect($searchCatTitles, $arr)) {
            $news->join('categories', 'news.category_id', '=', 'categories.id')
                 ->whereIn('category_id', array_keys($arr))
                 ->select('news.*');
        }

        $news = $news->paginate(5);

        return view('news.aftersearch', compact('news'));
    }
}
