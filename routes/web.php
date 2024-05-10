<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\InscriptionController;

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication routes
Route::get('/inscription', function () {
    return view('inscription');
});

Route::get('/login', function () {
    return view('login');
});

// Account creation routes
Route::get('/creer_compte', function () {
    return view('creation_du_compte');
});

Route::get('/creer_client', function () {
    return view('creation_du_client');
});

Route::get('/ouvrir_compte', function () {
    return view('creation_du_compte');
});

// Products and services routes
Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/qui-sommes-nous' , function(){
    return view('qui_somme_nous');
})->name('qui-sommes-nous');

Route::get('/particuliers_compte' , function(){
    return view('particuliers_compte');
})->name('particuliers_compte');

Route::get('/particuliers_carte' , function(){
    return view('particuliers_carte');
})->name('particuliers_carte');

Route::get('/entreprises', function () {
    return view('entreprises');
})->name('entreprises');


// Chat interface route
Route::get('/chat', function () {
    return view('chat');
})->name('chat');

// Compte routes
Route::get('/compte/{num_cmt}', [CompteController::class, 'show_info_compte'])->name('compte.info_compte');
Route::get('/compte', [ClientController::class, 'show_info'])->name('compte.info_client');
Route::get('/compte/activate/{num_cmt}', [CompteController::class, 'activate'])->name('compte.activate');
Route::match(['get', 'post'], '/compte/activation/{num_cmt}/{activation_code}', [CompteController::class, 'activationPage'])->name('compte.activation_page');
Route::post('/compte/process-activation/{num_cmt}/{activation_code}', [CompteController::class, 'processActivation'])->name('compte.process_activation');
Route::get('/compte/{id}/products', [CompteController::class, 'showProducts'])->name('compte.show_products');
Route::post('/compte/transfer_money', [CompteController::class, 'transferMoney'])->name('compte.transfer_money');
// User actions routes
Route::post('/inscrire', [InscriptionController::class, 'inscrire']);
Route::post('/logout', [SessionController::class, 'logout']);
Route::post('/login', [SessionController::class, 'login']);
Route::post('/nv_client', [ClientController::class, 'nv_client']);
Route::post('/open_account', [CompteController::class, 'new_account']);


//Rasa Chatbot Route
Route::post('/webhooks/rest/webhook', 'App\Http\Controllers\ChatbotController@handleWebhook');

//User Information Routes
Route::get('/change-password', [ClientController::class, 'showChangePasswordForm'])->name('change_password');
Route::post('/update-password', [ClientController::class, 'updatePassword'])->name('update_password');
Route::get('/change-email', [ClientController::class, 'showChangeEmailForm'])->name('change_email');
Route::post('/update-email', [ClientController::class, 'updateEmail'])->name('update_email');
Route::get('/change-phone-number', [ClientController::class, 'showChangePhoneNumberForm'])->name('change_phone_number');
Route::post('/update-phone-number', [ClientController::class, 'updatePhoneNumber'])->name('update_phone_number');
