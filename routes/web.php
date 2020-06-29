<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'RecipeController@index')->name('home');

Route::get('/new-recipe', 'RecipeController@addRecipe')->name('newRecipe');
Route::post('/save-recipe', 'RecipeController@saveRecipe');

Route::get('/all-recipes', 'RecipeController@allRecipes')->name('allRecipes');
Route::get('/recipe/{recipe}', 'RecipeController@oneRecipe')->name('oneRecipe');

Route::get('/edit-recipe/{recipe}', 'RecipeController@editRecipe')->name('editRecipe');
Route::post('/save-updated-recipe/{recipe}', 'RecipeController@updateRecipe');

Route::get('/delete-recipe/{recipe}', 'RecipeController@deleteRecipe')->name('deleteRecipe');
