<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashbord',[AuthController::class,'dashbord'])->middleware('guard');
Route::get('home',[PostController::class,'home'])->middleware('guard');


Route::get('/registration',[AuthController::class,'registration_show'])->middleware('authCheck');
Route::post('/add-registration',[AuthController::class,'registration_add']);

Route::get('/login',[AuthController::class,'show_login']);
Route::post('/add-login',[AuthController::class,'login_add']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::post('post-image',[PostController::class,'post_image']);
Route::get('post',[PostController::class,'post']);
Route::post('get-post',[PostController::class,'get_post']);

Route::post('/post-like',[PostController::class,'post_like']);