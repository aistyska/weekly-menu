<?php

namespace App\Http\Controllers;

use App\Rules\Monday;
use Illuminate\Http\Request;
use App\Recipe;
use App\Menu;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    private function getWeekValidation() {
        return ['weekStart' => [
            'required',
            'date',
            'after:today',
            'unique:App\Menu,week_start',
            new Monday
        ]];
    }

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


    public function mixedMenu(){
        $randomRecipes = Recipe::inRandomOrder()->limit(7)->get('id');
        $recipes = Recipe::orderBy('title', 'asc')->get();
        return view('pages.generate-manual-menu', ['randomRecIds' => $randomRecipes, 'recipes' => $recipes]);
    }


    public function saveMenu(Request $request){
        $request->validate($this->getWeekValidation());
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


    public function oldMenu(){
        $menuIds = Menu::orderBy('week_start', 'desc')->get('id'); // ids of all menus
        return view('pages.previous-menu', ['menus' => $menuIds]);
    }


    public function saveOldMenuAsNew(Request $request){
        $request->validate($this->getWeekValidation());
        $menu = new Menu;
        $menu->week_start = $request->input('weekStart');
        $menu->save();
        $selectedMenu = Menu::find($request->input('selectedMenu'));
        $data = [];
        foreach ($selectedMenu->recipes as $recipe){
            $data[$recipe->id] = ['week_day' => $recipe->pivot->week_day];
        }
        $menu->recipes()->attach($data);

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
