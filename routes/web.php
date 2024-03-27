<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscriptionController;


Route::get('/' , function(){
    return view('home');
});
Route::get('/inscription', function () {
    return view('inscription');
});
Route::post('/inscrire' , [InscriptionController::class , 'inscrire']);
Route::post('/logout', [InscriptionController::class , 'logout']);
Route::post('/login', [InscriptionController::class , 'login']);
