<?php

use App\Models\Client;
use App\Models\Compte;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\Auth\VerificationController;


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
Route::get('/ouvrir_compte',function(){
    return view('creation_du_compte');
});

Route::get('/compte/{num_cmt}', [CompteController::class, 'show_info_compte'])->name('compte.info_compte');
Route::get('/compte', [ClientController::class, 'show_info'])->name('compte.info_client');
Route::get('/compte/activate/{num_cmt}', [CompteController::class, 'activate'])->name('compte.activate');
Route::match(['get', 'post'], '/compte/activation/{num_cmt}/{activation_code}', [CompteController::class, 'activationPage'])->name('compte.activation_page');
Route::post('/compte/process-activation/{num_cmt}/{activation_code}', [CompteController::class, 'processActivation'])->name('compte.process_activation');
Route::get('/compte/{id}/products', [CompteController::class, 'showProducts'])->name('compte.show_products');

Route::post('/inscrire' , [InscriptionController::class , 'inscrire']);
Route::post('/logout', [SessionController::class , 'logout']);
Route::post('/login', [SessionController::class , 'login']);
Route::post('/nv_client',[ClientController::class ,'nv_client']);
Route::post('/open_account',[CompteController::class,'new_account']);
