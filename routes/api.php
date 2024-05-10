<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::middleware('auth:sanctum')->get('/balance', [ChatbotController::class, 'getBalance']);
Route::get('/balance', [ChatbotController::class, 'getBalance']);
