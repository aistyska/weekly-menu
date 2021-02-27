<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use Illuminate\Validation\Rule;

class RecipeController extends Controller
{
    public function index(){
        return view('pages/home');
    }

    public function addRecipe(Request $request){
        $sideDish = false;
        $needsSideDish = false;
        if ($request->old('_token') !== null) {
            if ($request->old('sideDish.0') == "needs_side_dish") {
                $needsSideDish = true;
            } elseif ($request->old('sideDish.0') == "is_side_dish") {
                $sideDish = true;
            }
        }
        return view('pages.add-recipe', ['needsSideDish' => $needsSideDish, 'isSideDish' => $sideDish]);
    }

    public function saveRecipe(Request $request){
        $request->validate([
            'title' => ['required', 'max:255', 'unique:App\Recipe,title'],
            'ingredients' => ['required'],
            'instructions' => ['required'],
            'url' => ['nullable', 'url', 'max:2000'],
            'comment' => ['nullable', 'max:1000'],
            'sideDish' => ['nullable', 'max:1']
        ]);
        $recipe = Recipe::create([
            'title' => $request->input('title'),
            'ingredients' => $request->input('ingredients'),
            'instructions' => $request->input('instructions'),
            'url' => $request->input('url'),
            'comment' => $request->input('comment'),
            'needs_side_dish' => $request->input('sideDish.0') == 'needs_side_dish',
            'is_side_dish' => $request->input('sideDish.0') == 'is_side_dish'
        ]);
        return redirect()->route('oneRecipe', ['recipe' => $recipe])->with('success', 'Receptas buvo išsaugotas');
    }


    public function allRecipes(Request $request) {
        if ($request->filled('title')) {
            $input = $request->query('title');
            $request->validate([
                'title' => ['min:3', 'max:255']
            ]);
            $results = Recipe::where('title', 'like', '%' . $input . '%')->orderBy('title', 'asc')->get();
            $count = count($results);
            if ($count == 0) {
                $results = Recipe::orderBy('title', 'asc')->get();
            }
        } else {
            $results = Recipe::orderBy('title', 'asc')->get();
            $count = count($results);
            $input = "";
        }
        return view('pages.all-recipes', ['recipes' => $results, 'count' => $count, 'input' => $input]);
    }

    public function oneRecipe(Recipe $recipe) {
        return view('pages.one-recipe', ['recipe' => $recipe]);
    }

    public function editRecipe(Recipe $recipe) {
        return view('pages.edit-recipe', ['recipe' => $recipe]);
    }

    public function updateRecipe(Recipe $recipe, Request $request) {
        $request->validate([
            'title' => ['required', 'max:255', Rule::unique('recipes')->ignore($recipe)],
            'ingredients' => ['required'],
            'instructions' => ['required'],
            'url' => ['nullable', 'url', 'max:2000'],
            'comment' => ['nullable', 'max:1000'],
            'sideDish' => ['nullable', 'max:1']
        ]);
        $data = $request->only(['title', 'ingredients', 'instructions', 'url', 'comment']);
        $data['needs_side_dish'] = $request->input('sideDish.0') == 'needs_side_dish';
        $data['is_side_dish'] = $request->input('sideDish.0') == 'is_side_dish';
        $recipe->update($data);
        return redirect()->route('oneRecipe', ['recipe' => $recipe])->with('success', 'Receptas buvo atnaujintas');
    }

    public function deleteRecipe(Recipe $recipe){
        $menus = $recipe->menus()->first();
        if (empty($menus)) {
            $recipe->delete();
            return redirect()->route('allRecipes')->with('success', 'Receptas buvo ištrintas.');
        } else {
            return redirect()->route('oneRecipe', ['recipe' => $recipe])->with('warning', 'Receptas negali būti ištrintas, nes anksčiau buvo įtrauktas į savaitės meniu.');
        }
    }
}
