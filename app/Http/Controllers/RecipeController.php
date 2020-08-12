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
        $useIn = true;
        if ($request->old('_token') !== null && $request->old('use_in_menu') != "on") {
            $useIn = false;
        }
        return view('pages.add-recipe', ['checked' => $useIn]);
    }

    public function saveRecipe(Request $request){
        $request->validate([
            'title' => ['required', 'max:255', 'unique:App\Recipe,title'],
            'ingredients' => ['required'],
            'instructions' => ['required'],
            'url' => ['nullable', 'url', 'max:2000'],
            'comment' => ['nullable', 'max:1000']
        ]);
        $recipe = Recipe::create([
            'title' => $request->input('title'),
            'ingredients' => $request->input('ingredients'),
            'instructions' => $request->input('instructions'),
            'url' => $request->input('url'),
            'comment' => $request->input('comment'),
            'use_in_menu' => $request->boolean('use_in_menu')
        ]);
        return redirect()->route('oneRecipe', ['recipe' => $recipe])->with('success', 'Receptas buvo išsaugotas');
    }


    public function allRecipes() {
        return view('pages.all-recipes', ['recipes' => Recipe::all()]);
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
            'comment' => ['nullable', 'max:1000']
        ]);
        $data = $request->only(['title', 'ingredients', 'instructions', 'url', 'comment']);
        $data['use_in_menu'] = $request->boolean('use_in_menu');
        $recipe->update($data);
        return redirect()->route('oneRecipe', ['recipe' => $recipe])->with('success', 'Receptas buvo atnaujintas');
    }

    public function deleteRecipe(Recipe $recipe){
        $menus = $recipe->menus()->first();
        if (empty($menus)) {
            $recipe->delete();
            return redirect()->route('allRecipes')->with('success', 'Receptas buvo ištrintas.');
        } else {
            $recipe->update(['use_in_menu' => 0]);
            return redirect()->route('oneRecipe', ['recipe' => $recipe])->with('warning', 'Receptas negali būti ištrintas, nes anksčiau buvo įtrauktas į savaitės meniu. Šis receptas NEBUS naudojamas sudarinėjant savaitės meniu.');
        }
    }
}
