<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Carbon;

class News extends Model
{
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'news_tag');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getThreeTopNews()
    {
        $top3CC = Comment::select('news_id')
            ->where('created_at', '>=',
            Carbon::now()->subHours(24)->toDateString())->selectRaw('count(news_id) as news_count')
            ->groupBy('news_id')->orderBy('news_count', 'desc')->limit(3)->get();

        $topThreeNews = [];
        foreach ($top3CC as $key => $value) {
            $topThreeNews[$key] = $value->news_id;
        }

        return $topNews = News::whereIn('id', $topThreeNews)->get();
    }
}
