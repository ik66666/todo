<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;


Route::get('/', [TodoController::class,'index']);
Route::post('/todos' , [TodoController::class,'store']);
Route::patch('/todos/update',[TodoController::class,'update']);
Route::post('/todos/delete', [TodoController::class,'delete']);

Route::get('/categories',[CategoryController::class,'index']);
Route::POST('/categories',[CategoryController::class,'store']);
Route::PATCH('/categories/update',[CategoryController::class,'update']);
Route::post('/categories/delete', [CategoryController::class,'delete']);
