<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\NewsController;


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

// Home
Route::get('/', [HomepageController::class, 'index']);

// News
Route::get('/search', [NewsController::class, 'search']);
Route::get('/{category}', [NewsController::class, 'archive']);
Route::get('/{category}/{slug}', [NewsController::class, 'single']);
Route::get('/{category}/{subcategory}/{slug}', [NewsController::class, 'subsingle']);
Route::get('/{category}/{subcategory}/{subsubcategory}/{slug}', [NewsController::class, 'subsubsingle']);