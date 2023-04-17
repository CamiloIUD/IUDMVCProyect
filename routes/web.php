<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WebController;

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
Route::get('/', [WebController::class, 'index'])->name('web.index');
Route::get('/detail/{id}', [WebController::class, 'detail'])->name('web.detail');
Route::get('/post_category/{category}', [WebController::class, 'post_category'])->name('web.post_category');
Route::get('/contact', [WebController::class, 'contact'])->name('web.contact');