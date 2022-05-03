<?php


use App\Http\Controllers\CafeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MoveController;
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

Route::get('/', [\App\Http\Controllers\BladeController::class,'cafe']);
Route::get('show/{id}', [\App\Http\Controllers\BladeController::class,'show'])->name('show');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware(['web', 'auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('cafe', CafeController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('move', MoveController::class);
    Route::get('map/{id}', [\App\Http\Controllers\ActiveController::class,'map'])->name('map_create');
    Route::get('create/{id}', [App\Http\Controllers\ActiveController::class,'create'])->name('create');

});



