<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScorecardController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/review', [ScorecardController::class, 'for_review'])->name('reviews.index');
Route::post('/store_data', [ScorecardController::class, 'store_data'])->name('store_data');
Route::get('/fetch_users', [ScorecardController::class, 'fetch_users'])->name('fetch_users');
Route::post('/view', [ScorecardController::class, 'view'])->name('scorecards.view');
Route::get('/send_review', [ScorecardController::class, 'send_review'])->name('scorecards.send_review');
Route::get('/fetch_prev_scorecard', [ScorecardController::class, 'fetch_prev_scorecard'])->name('fetch_prev_scorecard');
