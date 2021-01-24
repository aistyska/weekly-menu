<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\MenuController;

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

Route::get('/', [RecipeController::class, 'index'])->name('home');

Route::get('/new-recipe', [RecipeController::class, 'addRecipe'])->name('newRecipe');
Route::post('/save-recipe', [RecipeController::class, 'saveRecipe']);

Route::get('/all-recipes', [RecipeController::class, 'allRecipes'])->name('allRecipes');
Route::get('/recipe/{recipe}', [RecipeController::class, 'oneRecipe'])->name('oneRecipe');

Route::get('/edit-recipe/{recipe}', [RecipeController::class, 'editRecipe'])->name('editRecipe');
Route::post('/save-updated-recipe/{recipe}', [RecipeController::class, 'updateRecipe']);

Route::get('/delete-recipe/{recipe}', [RecipeController::class, 'deleteRecipe'])->name('deleteRecipe');


Route::get('/generation-type', [MenuController::class, 'generationType'])->name('genType');

Route::get('/menu/generate', [MenuController::class, 'generateMenu'])->name('generate');
Route::get('/menu/manual', [MenuController::class, 'manualMenu'])->name('manual');
Route::get('/menu/generate-and-choose', [MenuController::class, 'mixedMenu'])->name('genAndManual');
Route::get('/menu/previous', [MenuController::class, 'oldMenu'])->name('previousMenu');

Route::post('/save-menu', [MenuController::class, 'saveMenu']);
Route::post('/save-menu-as-new', [MenuController::class, 'saveOldMenuAsNew']);

Route::get('/menu/all', [MenuController::class, 'allMenus'])->name('allMenus');
Route::get('/menu/{menu}', [MenuController::class, 'oneMenu'])->name('oneMenu');

Route::get('/menu/{menu}/downloadPDF', [MenuController::class, 'downloadPDF'])->name('downloadPDF');
