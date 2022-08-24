<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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
Route::get('/login', [LoginController::class,'index'])->name('login.index');
Route::post('/login',[LoginController::class,'authenticate'])->name('login.post');
// Route::middleware(['auth'])->group(function () {

 Route::prefix('blog')->group(function(){
Route::get('/',[BlogController::class,'index'])->name('blog.index');
Route::get('/edit',[BlogController::class,'edit'])->name('blog.edit');
Route::post('/update',[BlogController::class,'update'])->name('blog.update');
Route::post('/delete',[BlogController::class,'delete'])->name('blog.delete');
Route::post('/logout',[LogoutController::class,'logout'])->name('logout');
});
// });