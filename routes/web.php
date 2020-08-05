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


Route::get('/generation-type', 'MenuController@generationType')->name('genType');

Route::get('/menu/generate', 'MenuController@generateMenu')->name('generate');
Route::get('/menu/manual', 'MenuController@manualMenu')->name('manual');
Route::get('/menu/generate-and-choose', 'MenuController@mixedMenu')->name('genAndManual');
Route::get('/menu/previous', 'MenuController@oldMenu')->name('previousMenu');

Route::post('/save-menu', 'MenuController@saveMenu');
Route::post('/save-menu-as-new', 'MenuController@saveOldMenuAsNew');

Route::get('/menu/all', 'MenuController@allMenus')->name('allMenus');
Route::get('/menu/{menu}', 'MenuController@oneMenu')->name('oneMenu');

Route::get('/menu/{menu}/downloadPDF', 'MenuController@downloadPDF')->name('downloadPDF');
