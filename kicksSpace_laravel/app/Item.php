<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'items_tags')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sizes()
    {
        return $this->belongsToMany('App\Size', 'item_size')->withTimestamps();
    }
}
