<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursController;

Route::get('/cours', [CoursController::class, 'index']);
Route::post('cours/create', [CoursController::class, 'store']);
Route::put('cours/edit/{id}', [CoursController::class, 'update']);
Route::delete('cours/{cours}', [CoursController::class, 'delete']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
