<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['title', 'ingredients', 'instructions', 'url', 'comment', 'needs_side_dish', 'is_side_dish'];


    public function menus(){
        return $this->belongsToMany('App\Menu')->withPivot('week_day');
    }
}
