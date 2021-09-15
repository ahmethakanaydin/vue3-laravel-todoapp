<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//public routes
Route::post('delete-todo',[TodoController::class, 'delete']);
Route::post('todo/mark-as-done',[TodoController::class, 'markAsDone']);
Route::post('todo/mark-as-undone',[TodoController::class, 'markAsUnDone']);
Route::get('todos', [TodoController::class, 'index']);
Route::post('store-todo', [TodoController::class, 'store']);

Route::post('register',[AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);

//private routes
/* Route::group(['middleware' => ['auth:sanctum']], function () {
   
}); */