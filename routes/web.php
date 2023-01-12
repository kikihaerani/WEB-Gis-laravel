<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MapsController;
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

// Route::get('/vew', function () {
//     return view('layouts.backend');
// });

Route::get('/', [WebController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/map', [CategoryController::class, 'index']);
Route::get('/m', [MapsController::class, 'index']);
Route::resource('maps', MapsController::class);


Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
