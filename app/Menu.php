<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    public function recipes(){
        return $this->belongsToMany('App\Recipe')->withPivot('week_day');
    }
}
