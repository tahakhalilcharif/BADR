<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\InscriptionController;


Route::get('/' , function(){
    return view('home');
});
Route::get('/inscription', function () {
    return view('inscription');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/creer_compte', function () {
    return view('creation_du_compte');
});
Route::get('/creer_client' , function(){
    return view('creation_du_client');
});

Route::post('/inscrire' , [InscriptionController::class , 'inscrire']);
Route::post('/logout', [SessionController::class , 'logout']);
Route::post('/login', [SessionController::class , 'login']);
Route::post('/nv_client',[ClientController::class ,'nv_client']);