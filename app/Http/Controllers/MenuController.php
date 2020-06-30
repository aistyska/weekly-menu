<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

class MenuController extends Controller
{
    public function generationType(){
        return view('pages.choose-generation-type');
    }


    public function generateMenu(){
        $recipes = Recipe::inRandomOrder()->limit(7)->get();
        return view('pages.generated-menu', ['menu' => $recipes]);
    }
}
