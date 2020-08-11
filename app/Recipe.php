<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['title', 'ingredients', 'instructions', 'url', 'comment', 'use_in_menu'];


    public function menus(){
        return $this->belongsToMany('App\Menu')->withPivot('week_day');
    }
}
