<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\JarController;

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

Route::resource('jar',JarController::class);

Route::post('/jar/{jar}/buy', [JarController::class, 'buy'])->name('jar.buy');
