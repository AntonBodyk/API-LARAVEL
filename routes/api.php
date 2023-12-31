<?php

// use App\Http\Controllers\Api\V1\DeskController;

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\BuyerController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\FoodTabController;
use App\Http\Controllers\Api\V1\LikeController;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\TodoController;
use App\Http\Controllers\Api\V1\UserController;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::get('/auth/logout', [AuthController::class, 'logoutUser'])->middleware('auth:sanctum');

Route::resources([
    'desks' => DeskController::class,
    'buyers' => BuyerController::class,
    'cards'=> FoodCardController::class,
    'tabs'=> FoodTabController::class,
    'todos' => TodoController::class,
    'posts' => PostController::class,
    'users' => UserController::class,
    'likes' => LikeController::class,
    'comments'=> CommentController::class
]);


// Route::get('/todos', 'App\Http\Controllers\Api\V1\TodoController@index')->name('todo.index');
// Route::post('/todos', 'App\Http\Controllers\Api\V1\TodoController@store')->name('todo.store');
// Route::delete('/todos/{todo}', 'App\Http\Controllers\Api\V1\TodoController@destroy')->name('todo.destroy');
// Route::get('/admin/applications', 'App\Http\Controllers\Api\V1\AdminController@index')->middleware('admin')->name('admin.post.index');
