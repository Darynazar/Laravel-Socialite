<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//socialite
Route::get('login/{provider}', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider']);
Route::get('{provider}/callback', [\App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback']);
//repository
Route::get('repository', [\App\Http\Controllers\GitConroller::class, 'allRepositories'])->middleware('auth');
Route::post('user-token', [\App\Http\Controllers\UserTokenController::class, 'store'])->name('UserTokenStore');
Route::get('user-token-show', [\App\Http\Controllers\UserTokenController::class, 'show'])->name('UserTokenShow');
