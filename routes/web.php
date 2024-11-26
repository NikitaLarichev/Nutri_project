<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Auth::routes();
Route::post('/anamnesis_completed', [App\Http\Controllers\AccountController::class, 'anamnesisComplete'])->name('anamnesis_completed');
Route::get('/about_me', [App\Http\Controllers\AboutMeController::class, 'index'])->name('about_me');
Route::get('/cases', [App\Http\Controllers\CasesController::class, 'index'])->name('cases');
Route::get('/contacts', [App\Http\Controllers\ContactsController::class, 'index'])->name('contacts');

Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products');
Route::post('/create_product', [App\Http\Controllers\ProductsController::class, 'productCreate'])->name('create_product')->middleware('auth')->middleware('role:admin');
Route::post('/update_product', [App\Http\Controllers\ProductsController::class, 'productUpdate'])->name('update_product')->middleware('auth')->middleware('role:admin');
Route::get('/delete_product/{product_id}', [App\Http\Controllers\ProductsController::class, 'productDelete'])->name('delete_product')->middleware('auth')->middleware('role:admin');

Route::post('/nj_save', [App\Http\Controllers\AccountController::class, 'journalSave'])->name('nj_save');
Route::get('/clients_list', [App\Http\Controllers\ClientListController::class, 'index'])->name('clients_list')->middleware('auth')->middleware('role:admin');
Route::get('/materials_storage', [App\Http\Controllers\MaterialsStorageController::class, 'index'])->name('materials_storage')->middleware('auth')->middleware('role:admin');
Route::post('/mat_loading', [App\Http\Controllers\MaterialsStorageController::class, 'materialLoading'])->name('mat_loading')->middleware('role:admin');
Route::get('/read_mat/{filename}', [App\Http\Controllers\MaterialsStorageController::class, 'readMaterial'])->name('read_mat')->middleware('auth')->middleware('role:user');
Route::get('/download_mat/{filename}', [App\Http\Controllers\MaterialsStorageController::class, 'downloadMaterial'])->name('download_mat')->middleware('auth')->middleware('role:user');
Route::get('/delete_mat/{filename}', [App\Http\Controllers\MaterialsStorageController::class, 'deleteMaterial'])->name('delete_mat')->middleware('auth')->middleware('role:user');

Route::get('/account_nj', [App\Http\Controllers\AccountController::class, 'index'])->name('account_nj')->middleware('auth')->middleware('role:user');
Route::get('/account_chat', [App\Http\Controllers\ChatController::class, 'accountChat'])->name('account_chat')->middleware('auth')->middleware('role:user');
Route::get('/client_chat/{id}', [App\Http\Controllers\ChatController::class, 'clientChat'])->name('client_chat')->middleware('auth')->middleware('role:admin');
Route::post('/send_message_to_admin', [App\Http\Controllers\ChatController::class, 'sendMessageToAdmin'])->name('send_message_to_admin')->middleware('auth')->middleware('role:user');
Route::post('/send_message_to_client', [App\Http\Controllers\ChatController::class, 'sendMessageToClient'])->name('send_message_to_client')->middleware('auth')->middleware('role:admin');

Route::get('/client/{id}', [App\Http\Controllers\ClientController::class, 'index'])->name('client')->middleware('auth')->middleware('role:admin');
Route::get('/client_questionnaire/{id}', [App\Http\Controllers\ClientController::class, 'clientQuestionnaire'])->name('client_questionnaire')->middleware('auth')->middleware('role:admin');
Route::get('/client_recommendations/{id}', [App\Http\Controllers\ClientController::class, 'clientRecommendations'])->name('client_recommendations')->middleware('auth')->middleware('role:admin');
Route::get('/client_nj/{id}', [App\Http\Controllers\ClientController::class, 'clientNutritionJournal'])->name('client_nj')->middleware('auth')->middleware('role:admin');
Route::post('/add_rec', [App\Http\Controllers\ClientController::class, 'addRecommendation'])->name('add_rec')->middleware('auth')->middleware('role:admin');
Route::get('/delete_rec/{id}', [App\Http\Controllers\ClientController::class, 'deleteRecommendation'])->name('delete_rec')->middleware('auth')->middleware('role:admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
