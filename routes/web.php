<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ClientActivationController;

// Home page
Route::get('/', function () {
    if(auth()->user()){

    }
    return view('home');
})->name('home');

// Authentication routes
Route::get('/inscription', function () {
    return view('inscription');
});

Route::get('/login', function () {
    return view('login');
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

// User actions routes
Route::post('/inscrire', [InscriptionController::class, 'inscrire']);
Route::get('/logout', [SessionController::class, 'logout']);
Route::post('/login', [SessionController::class, 'login']);
Route::post('/open_account', [CompteController::class, 'new_account']);


//Rasa Chatbot Route
Route::post('/webhooks/rest/webhook', 'App\Http\Controllers\ChatbotController@handleWebhook');



//Tries 

//client creation routes
Route::get('/create-client', [ClientController::class,'showClientCreationForm'])->name('client.create-form');
Route::post('/create-client', [ClientController::class ,'createClient'])->name('client.create');
//Route::get('/creer_client', [ClientController::class, 'showClientRegistrationForm']);
//Route::post('/nv_client', [ClientController::class, 'nv_client']);
//client activation routes 
Route::get('/activation-page', [ClientActivationController::class, 'showActivationPage'])->name('activation.page');
Route::post('/activate-client', [ClientActivationController::class, 'activateClient'])->name('activate.client');

Route::middleware(['verified_user'])->group(function () {
    // Routes that require activated accounts

    //open account routes
    Route::get('/ouvrir_compte', [CompteController::class, 'showForm'])->name('ouvrir_compte');


    //Account functionalities
    Route::get('/compte/{num_cmt}', [CompteController::class, 'show_info_compte'])->name('compte.info_compte');
    Route::get('/compte', [ClientController::class, 'show_info'])->name('compte.info_client');
    Route::get('/ac', [CompteController::class, 'showProducts'])->name('compte.show_products');
    Route::post('/compte/transfer_money', [CompteController::class, 'transferMoney'])->name('compte.transfer_money');
    Route::get('/new_account_form' , [CompteController::class ,'showForm'])->name('new_account_form');
    Route::get('/compte/{id}/demand_product', [CompteController::class, 'showOrderProductPage'])->name('compte.demand_product');
    Route::post('/compte/store_product_order/{id}', [CompteController::class, 'storeProductOrder'])->name('compte.store_product_order');

    //Upate User Information Routes
    Route::get('/change-password', [ClientController::class, 'showChangePasswordForm'])->name('change_password');
    Route::post('/update-password', [ClientController::class, 'updatePassword'])->name('update_password');
    Route::get('/change-email', [ClientController::class, 'showChangeEmailForm'])->name('change_email');
    Route::post('/update-email', [ClientController::class, 'updateEmail'])->name('update_email');
    Route::get('/change-phone-number', [ClientController::class, 'showChangePhoneNumberForm'])->name('change_phone_number');
    Route::post('/update-phone-number', [ClientController::class, 'updatePhoneNumber'])->name('update_phone_number');


});

Route::middleware(['auth', 'employee'])->group(function () {
    Route::get('/employee/home', [EmployeeController::class, 'index'])->name('employee.home_emp');
});