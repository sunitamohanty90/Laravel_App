<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apicontroller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//for register

Route::post('/register',[apicontroller::class,'register']);

//forlogin
Route::get('/login',[apicontroller::class,'login']);
Route::post('/login',[apicontroller::class,'loginf']);

//for posts
Route::get('/post',[apicontroller::class,'post'])->middleware('auth:api');
Route::post('/createpost',[apicontroller::class,'store'])->middleware('auth:api');
Route::get('/getposts',[apicontroller::class,'getPosts'])->middleware('auth:api');
Route::delete('/delete/{id}',[apicontroller::class,'delete'])->middleware('auth:api');
Route::get('/getpost/{id}',[apicontroller::class,'getpost'])->middleware('auth:api');
Route::post('/update/{id}',[apicontroller::class,'update'])->middleware('auth:api');
Route::get('loginuser/{user_id}',[apicontroller::class,'loginUser'])->middleware('auth:api');


//for Profile
Route::post('/createabout',[apicontroller::class,'createabout'])->middleware('auth:api');
Route::get('/getabout',[apicontroller::class,'aboutget'])->middleware('auth:api');
Route::get('editabout/{id}',[apicontroller::class,'editabout'])->middleware('auth:api');
Route::post('updateabout/{id}',[apicontroller::class,'updateabout'])->middleware('auth:api');
Route::delete('deleteabout/{id}',[apicontroller::class,'deleteabout'])->middleware('auth:api');
Route::get('loginprofile/{user_id2}',[apicontroller::class,'loginProfile'])->middleware('auth:api');

//for logout
Route::post('/logout',[apicontroller::class,'logout'])->middleware('auth:api');





