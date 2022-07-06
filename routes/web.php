<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\facebookcontroller;

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
    return view('login');
});
Route::get('/home',[facebookcontroller::class,'home'])->middleware('isLogIn');

Route::get('/register',[facebookcontroller::class,'index']);
Route::post('/register',[facebookcontroller::class,'register']);

Route::get('/login',[facebookcontroller::class,'login']);
Route::post('/login',[facebookcontroller::class,'loginf'])->name('loginn');
Route::get('/profile',[facebookcontroller::class,'profile'])->middleware('isLogIn');
Route::get('/post',[facebookcontroller::class,'post'])->middleware('isLogIn');
Route::post('/post',[facebookcontroller::class,'post1'])->name('post1');
Route::get('/createpost',[facebookcontroller::class,'createpost'])->middleware('isLogIn');
Route::post('/createpost',[facebookcontroller::class,'store'])->name('postcreate');
Route::get('/logout',[facebookcontroller::class,'logout'])->middleware('isLogIn');
Route::get('delete/{id}',[facebookcontroller::class,'delete']);
Route::get('edit/{id}',[facebookcontroller::class,'edit']);
Route::post('update/{id}',[facebookcontroller::class,'update'])->name('postupdate');
Route::post('/about',[facebookcontroller::class,'About'])->name('aboutdetails');
Route::get('/about',[facebookcontroller::class,'aboutget']);
Route::get('editabout/{id}',[facebookcontroller::class,'editabout']);
Route::post('updateabout/{id}',[facebookcontroller::class,'updateabout'])->name('detailsupdate');
