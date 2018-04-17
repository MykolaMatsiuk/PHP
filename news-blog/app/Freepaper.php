<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freepaper extends Model
{
    public function navsubmenu()
    {
        return $this->belongsTo(Navsubmenu::class);
    }
}
