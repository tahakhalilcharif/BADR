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

Route::get('/compte', function(){
    $userID = Auth::user()->id;
    if($userID){
        $client = Client::where('user_id',$userID)->first();
        $comptes = Compte::where('id_client',$client['id_client'])->get();
        return view('compte.info_client',['client'=>$client,'comptes'=>$comptes]);
    }
    return view('compte.info_client');
});

Route::post('/inscrire' , [InscriptionController::class , 'inscrire']);
Route::post('/logout', [SessionController::class , 'logout']);
Route::post('/login', [SessionController::class , 'login']);
Route::post('/nv_client',[ClientController::class ,'nv_client']);
Route::post('/open_account',[CompteController::class,'new_account']);

//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::post('email/verify', [VerificationController::class, 'verify'])->name('verification.verify');

