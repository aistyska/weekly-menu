<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

class RecipeController extends Controller
{
    public function index(){
        return view('pages/home');
    }

    public function addRecipe(){
        return view('pages.add-recipe');
    }

    public function saveRecipe(Request $request){
        $request->validate([
            'title' => ['required', 'max:255'],
            'ingredients' => ['required'],
            'instructions' => ['required'],
            'url' => ['nullable', 'url', 'max:255'],
            'comment' => ['nullable', 'max:1000']
        ]);
        $recipe = Recipe::create([
            'title' => $request->input('title'),
            'ingredients' => $request->input('ingredients'),
            'instructions' => $request->input('instructions'),
            'url' => $request->input('url'),
            'comment' => $request->input('comment')
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
            'title' => ['required', 'max:255'],
            'ingredients' => ['required'],
            'instructions' => ['required'],
            'url' => ['nullable', 'url', 'max:255'],
            'comment' => ['nullable', 'max:1000']
        ]);

        $recipe->update($request->only(['title', 'ingredients', 'instructions', 'url', 'comment']));
        return redirect()->route('oneRecipe', ['recipe' => $recipe])->with('success', 'Receptas buvo atnaujintas');
    }

    public function deleteRecipe(Recipe $recipe){
        $recipe->delete();
        return redirect()->route('allRecipes')->with('success', 'Receptas buvo ištrintas.');
    }
}
