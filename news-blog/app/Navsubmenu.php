<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navsubmenu extends Model
{
    public function navmenu()
    {
        return $this->belongsTo(Navmenu::class);
    }

    public function freepaper()
    {
        return $this->hasMany(Freepaper::class);
    }
}
