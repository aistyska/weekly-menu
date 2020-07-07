<?php

namespace App\Http\Controllers;

use App\Rules\Monday;
use Illuminate\Http\Request;
use App\Recipe;
use App\Menu;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function generationType(){
        return view('pages.choose-generation-type');
    }


    public function generateMenu(Request $request){
        if ($request->old('_token') !== null) {
            $recipes = [];
            for ($i = 1; $i < 8; $i++){
                $recipes[] = Recipe::find($request->old($i));
            }
        } else {
            $recipes = Recipe::inRandomOrder()->limit(7)->get();
        }
        return view('pages.generated-menu', ['menu' => $recipes]);
    }


    public function manualMenu(){
        return view('pages.manual-menu', ['recipes' => Recipe::orderBy('title', 'asc')->get()]);
    }


    public function saveMenu(Request $request){
        $request->validate([
            'weekStart' => [
                'required',
                'date',
                'after:today',
                'unique:App\Menu,week_start',
                new Monday
            ]
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
        return view('pages.one-menu', ['menu' => $menu, 'date' => $menu->getWeekEnd()]);
    }


    public function allMenus(){
        $menus = Menu::orderBy('week_start', 'desc')->get();
        return view('pages.all-menus', ['menus' => $menus]);
    }
}
