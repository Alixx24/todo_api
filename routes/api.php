<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Task\CategoryController;
use App\Http\Controllers\Task\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    //task start
    Route::apiResource('task', TaskController::class);
    Route::apiResource('category', CategoryController::class);
});


//Route::put('category/{id}', [AuthController::class, 'update']);
