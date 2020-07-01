<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Menu;

class MenuController extends Controller
{
    public function generationType(){
        return view('pages.choose-generation-type');
    }


    public function generateMenu(){
        $recipes = Recipe::inRandomOrder()->limit(7)->get();
        return view('pages.generated-menu', ['menu' => $recipes]);
    }


    public function saveMenu(Request $request){
        $request->validate([
            'weekStart' => ['required', 'unique:App\Menu,week_start']
        ]);
        $menu = new Menu;
        $menu->week_start = $request->input('weekStart');

        DB::transaction(function () use ($menu, $request) {
            $menu->save();

            $input = $request->except('weekStart', '_token');
            $data = [];
            foreach ($input as $day => $recipeId) {
                $data[$recipeId] = ['week_day' => $day];
            }
            $menu->recipes()->attach($data);
        });

        return redirect()->route('oneMenu', ['menu' => $menu]);
    }


    public function oneMenu(Menu $menu){
        return view('pages.one-menu', ['menu' => $menu]);
    }

}
