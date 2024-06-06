<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/users',[UserController::class, 'index']); // GET  -http://127.0.0.1:8000/api/users?page=1
Route::get('/users/{user}',[UserController::class, 'show']); // GET  -http://127.0.0.1:8000/api/users/1
Route::post('/users', [UserController::class, 'store']); //post  -http://127.0.0.1:8000/api/users
Route::put('/users/{user}', [UserController::class, 'update']); //put  -http://127.0.0.1:8000/api/users/1
Route::delete('/users/{user}', [UserController::class, 'destroy']); //delete -http://127.0.0.1:8000/api/users/1