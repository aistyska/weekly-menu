<?php

namespace App;

use DateInterval;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    public function recipes(){
        return $this->belongsToMany('App\Recipe')->withPivot('week_day');
    }

    public function getWeekEnd(){
        $weekEnds = new DateTime($this->week_start);
        $weekEnds->add(new DateInterval('P7D'));
        return $weekEnds->format('Y-m-d');
    }


    public function getOrderedRecipesByWeekDay() {
        return $this->recipes()->orderBy('menu_recipe.week_day', 'asc')->get();
    }
}
