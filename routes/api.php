<?php

use App\Http\Controllers\Api\StudentClassController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//student class
Route::get('/student/class', [StudentClassController::class, 'index']);
Route::post('/class/store', [StudentClassController::class, 'store']);
Route::get('/class/edit/{id}', [StudentClassController::class, 'edit']);
Route::post('/class/update/{id}', [StudentClassController::class, 'update']);
Route::get('/class/delete/{id}', [StudentClassController::class, 'delete']);
