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
        Recipe::create([
            'title' => $request->input('title'),
            'ingredients' => $request->input('ingredients'),
            'instructions' => $request->input('instructions'),
            'url' => $request->input('url'),
            'comment' => $request->input('comment')
        ]);
        return redirect('/')->with('success', 'Receptas buvo išsaugotas');
    }
}
