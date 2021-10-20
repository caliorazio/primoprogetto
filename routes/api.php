<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('allUsers',);




Route::get('/add-post', [PostController::class,'addPost'])->name('post.add');


Route::post('/add-post', [PostController::class,'savePost'])->name('save.post');
Route::get('/post-list', [PostController::class,'postList'])->name('post.list');
Route::get('/edit-post/{id}', [PostController::class,'editPost'])->name('post.edit');


/*
Route::get('/delete-post/{id}', [PostController::class,'deletePost'])->name('post.delete'); */




Route::put('updatePost/{id}', [PostController::class,'updatePost'])

;




Route::delete('deletePost/{id}', [PostController::class,'deletePost'])->name('post.delete');



Route::get("posted", [PostController::class,'getPost'])->name('get.post');


Route::get("post/{id}", [PostController::class,'getPostById'])->name('get.post');


Route::post("addPost", [PostController::class, 'addPost']);


Route::get('page','PostController@viewpage');

Route::get("index", [PostController::class, 'index']);





Route::post("register", [LoginController::class, 'register']);
Route::post("login", [LoginController::class, 'login']);
