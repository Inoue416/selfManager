<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\TodolistController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TwitterController;
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
    return view('index');
});

Auth::routes();
Route::get('/twitter', [TwitterController::class, 'redirectToProvider']);
Route::get('/twitter/callback', [TwitterController::class, 'handleProviderCallback']);
Route::get('/auth/twitter_password/{id?}', [TwitterController::class, 'twitter_password']);
Route::post('/auth/twitter_password_register', [TwitterController::class, 'twitter_password_register']);
// route of goal contents
Route::get('/auth/login_home', [LoginController::class, 'login_home']);

Route::get('/goal/goal', [GoalController::class, 'goal']);
Route::get('/goal/create_goal', [GoalController::class, 'create_goal']);
Route::post('/goal/add_goal', [GoalController::class, 'add_goal']);
Route::post('/goal/delete_goal', [GoalController::class, 'delete_goal']);
Route::get('/goal/part_point/{id?}', [GoalController::class, 'part_point']);
Route::post('/goal/give_point', [GoalController::class, 'give_point']);
Route::get('/goal/achieved_goal', [GoalController::class, 'achieved_goal']);
Route::get('/goal/detail_goal/{id?}', [GoalController::class, 'detail_goal']);
Route::get('/goal/edit_goal/{id?}', [GoalController::class, 'edit_goal']);
Route::post('/goal/update_goal', [GoalController::class, 'update_goal']);
Route::get('/goal/detail_achieved_goal/{id?}', [GoalController::class, 'detail_achieved_goal']);

// route of todolist contents
Route::get('/todolist/todolist', [TodolistController::class, 'todolist']);
Route::get('/todolist/create_todolist', [TodolistController::class, 'create_todolist']);
Route::post('/todolist/add_todolist', [TodolistController::class, 'add_todolist']);
Route::post('/todolist/delete_todolist', [TodolistController::class, 'delete_todolist']);
Route::get('/todolist/achieved_todolist', [TodolistController::class, 'achieved_todolist']);
Route::post('/todolist/finish_todolist', [TodolistController::class, 'finish_todolist']);
Route::get('/todolist/detail_todolist/{id?}', [TodolistController::class, 'detail_todolist']);
Route::get('/todolist/edit_todolist/{id?}', [TodolistController::class, 'edit_todolist']);
Route::post('/todolist/update_todolist', [TodolistController::class, 'update_todolist']);
Route::get('/todolist/detail_achieved_todolist/{id?}', [TodolistController::class, 'detail_achieved_todolist']);
