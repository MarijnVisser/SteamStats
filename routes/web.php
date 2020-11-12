<?php

<<<<<<< HEAD
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
=======
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
>>>>>>> e29ec604d0b31c01e2513288726156f0656c6b85

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

<<<<<<< HEAD
Route::get('/auth/steam', [AuthController::class, 'redirectToSteam']);

Route::get('/auth/steam/handle', [AuthController::class, 'handle']);

=======
>>>>>>> e29ec604d0b31c01e2513288726156f0656c6b85
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<<<<<<< HEAD
Route::get('/profile', [ProfileController::class, 'index']);


//Route::post('logout', 'Auth\LoginController@logout')->name('logout');

=======
Route::get('/get_games', [GamesController::class, 'store']);

Route::get('/games', [GamesController::class, 'index']);

Route::get('/game/{id}', [GamesController::class, 'show'])->name('game');
>>>>>>> e29ec604d0b31c01e2513288726156f0656c6b85
