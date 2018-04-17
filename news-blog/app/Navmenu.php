<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navmenu extends Model
{
    public function navsubmenu()
    {
        return $this->hasMany(Navsubmenu::class);
    }
}
