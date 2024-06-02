<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatbotController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::middleware('auth:sanctum')->get('/balance', [ChatbotController::class, 'getBalance']);
Route::post('/register' , [AuthController::class,'register']);

Route::group(['middleware' => ['auth:sanctum']],function(){
    Route::get('/balance', [ChatbotController::class, 'getBalance']);
    Route::get('/transactions', [ChatbotController::class, 'getTransactions']);
    Route::post('/transfer', [ChatbotController::class, 'transfer']); // Changed to POST
    Route::get('/account_details', [ChatbotController::class, 'getAccountDetails']);
    Route::get('/order_product', [ChatbotController::class, 'OrderProduct']);
    Route::get('/check_status', [ChatbotController::class, 'CheckStatus']);
});
