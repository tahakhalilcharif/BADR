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

Route::get('/entreprises_compte', function () {
    return view('entreprises_compte');
})->name('entreprises_compte');

Route::get('/entreprises_carte', function () {
    return view('entreprises_carte');
})->name('entreprises_carte');


// User actions routes
Route::post('/inscrire', [InscriptionController::class, 'inscrire']);
Route::get('/logout', [SessionController::class, 'logout']);
Route::get('/logout', [SessionController::class, 'logout']);
Route::post('/login', [SessionController::class, 'login']);
Route::post('/open_account', [CompteController::class, 'new_account']);


//Rasa Chatbot Route
Route::post('/webhooks/rest/webhook', 'App\Http\Controllers\ChatbotController@handleWebhook');



//client creation routes
Route::get('/create-client', [ClientController::class,'showClientCreationForm'])->name('client.create-form');
Route::post('/create-client', [ClientController::class ,'createClient'])->name('client.create');

//client activation routes
Route::get('/activation-page', [ClientActivationController::class, 'showActivationPage'])->name('activation.page');
Route::post('/activate-client', [ClientActivationController::class, 'activateClient'])->name('activate.client');

Route::middleware(['verified_user'])->group(function () {
    // Routes that require activated accounts

    //open account routes
    Route::get('/ouvrir_compte', [CompteController::class, 'showForm'])->name('ouvrir_compte');


    //Account functionalities
    Route::get('/compte/transaction/{num_cmt}',[CompteController::class , 'showTransactionPage'])->name('compte.transaction');
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
    Route::get('/employee/unactivated-users', [EmployeeController::class, 'unactivatedUsers'])->name('employee.unactivated_users');
    Route::get('/employee/clients', [EmployeeController::class, 'clients'])->name('employee.clients');
    Route::get('/employee/users', [EmployeeController::class, 'users'])->name('employee.users');
    Route::get('/employee/demands', [EmployeeController::class, 'demands'])->name('employee.demands');
    Route::get('/employee/accounts', [EmployeeController::class, 'accounts'])->name('employee.accounts');
    Route::get('/employee/statistics', [EmployeeController::class, 'statistics'])->name('employee.statistics');
    Route::get('/employee/add-client', [EmployeeController::class, 'addClient'])->name('employee.add_client');
    Route::post('/employee/store-client', [EmployeeController::class, 'storeClient'])->name('employee.store_client');

});
