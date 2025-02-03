<?php

use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

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

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main');
Auth::routes();
Route::get('/account_questionnaire/{id}', [App\Http\Controllers\AccountController::class, 'accountQuestionnaire'])->name('account_questionnaire');
Route::post('/anamnesis_completed', [App\Http\Controllers\AccountController::class, 'anamnesisComplete'])->name('anamnesis_completed');
Route::get('/about_me', [App\Http\Controllers\AboutMeController::class, 'index'])->name('about_me');
Route::get('/delete_diplom/{path}', [App\Http\Controllers\AboutMeController::class, 'deleteDiplom'])->name('delete_diplom')->middleware('auth')->middleware('role:admin');;
Route::post('/add_diplom', [App\Http\Controllers\AboutMeController::class, 'addDiplom'])->name('add_diplom')->middleware('auth')->middleware('role:admin');


Route::get('/cases', [App\Http\Controllers\CasesController::class, 'index'])->name('cases');
Route::get('/case_del/{id}', [App\Http\Controllers\CasesController::class, 'reviewDelete'])->name('case_del')->middleware('auth')->middleware('role:admin');
Route::post('/case_create', [App\Http\Controllers\CasesController::class, 'reviewCreate'])->name('case_create')->middleware('auth')->middleware('role:user');;
Route::get('/contacts', [App\Http\Controllers\ContactsController::class, 'index'])->name('contacts');

// Route::get('/sm', function () {
//     //$update = Telegram::commandsHandler(true);
//     //dd($update->getMessage()->getChat()->getId());
//     $chatId = '771061410';
//     $message = 'Hello from laravel';

//     Telegram::sendMessage([
//         'chat_id' => $chatId,
//         'text' => $message,
//     ]);
// });

// Route::post('/telegram/webhook', [App\Http\Controllers\TelegramController::class, 'handle'])->name('telegram');

Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products');
Route::post('/create_product', [App\Http\Controllers\ProductsController::class, 'productCreate'])->name('create_product')->middleware('auth')->middleware('role:admin');
Route::post('/update_product', [App\Http\Controllers\ProductsController::class, 'productUpdate'])->name('update_product')->middleware('auth')->middleware('role:admin');
Route::get('/delete_product/{product_id}', [App\Http\Controllers\ProductsController::class, 'productDelete'])->name('delete_product')->middleware('auth')->middleware('role:admin');
Route::get('/update_product', [App\Http\Controllers\ProductsController::class, 'productUpdate'])->name('update_product')->middleware('auth')->middleware('role:admin');

Route::post('/nj_save', [App\Http\Controllers\AccountController::class, 'journalSave'])->name('nj_save');
Route::get('/clients_list', [App\Http\Controllers\ClientListController::class, 'index'])->name('clients_list')->middleware('auth')->middleware('role:admin');
Route::get('/materials_storage', [App\Http\Controllers\MaterialsStorageController::class, 'index'])->name('materials_storage')->middleware('auth')->middleware('role:admin');
Route::post('/mat_loading', [App\Http\Controllers\MaterialsStorageController::class, 'materialLoading'])->name('mat_loading')->middleware('role:admin');
Route::get('/read_mat/{filename}', [App\Http\Controllers\MaterialsStorageController::class, 'readMaterial'])->name('read_mat')->middleware('auth')->middleware('role:user');
Route::get('/download_mat/{filename}', [App\Http\Controllers\MaterialsStorageController::class, 'downloadMaterial'])->name('download_mat')->middleware('auth')->middleware('role:admin');
Route::get('/delete_mat/{filename}', [App\Http\Controllers\MaterialsStorageController::class, 'deleteMaterial'])->name('delete_mat')->middleware('auth')->middleware('role:admin');

Route::get('/account_nj', [App\Http\Controllers\AccountController::class, 'index'])->name('account_nj')->middleware('auth')->middleware('role:user');
Route::post('/analysis_loading', [App\Http\Controllers\AccountController::class, 'analysisLoading'])->name('analysis_loading')->middleware('auth')->middleware('role:user');
Route::get('/account_analyzes', [App\Http\Controllers\AccountController::class, 'analyzesView'])->name('account_analyzes')->middleware('auth')->middleware('role:user');
Route::get('/analysis_reading/{filename}', [App\Http\Controllers\AccountController::class, 'analysisReading'])->name('analysis_reading')->middleware('auth');
Route::get('/account_chat', [App\Http\Controllers\ChatController::class, 'accountChat'])->name('account_chat')->middleware('auth')->middleware('role:user');
Route::get('/account_recommendations', [App\Http\Controllers\AccountController::class, 'accountRecommendations'])->name('account_recommendations')->middleware('auth')->middleware('role:user');
Route::get('/account_materials', [App\Http\Controllers\AccountController::class, 'accountMaterials'])->name('account_materials')->middleware('auth')->middleware('role:user');
Route::get('/client_chat/{id}', [App\Http\Controllers\ChatController::class, 'clientChat'])->name('client_chat')->middleware('auth')->middleware('role:admin');
Route::post('/send_message_to_admin', [App\Http\Controllers\ChatController::class, 'sendMessageToAdmin'])->name('send_message_to_admin')->middleware('auth')->middleware('role:user');
Route::post('/send_message_to_client', [App\Http\Controllers\ChatController::class, 'sendMessageToClient'])->name('send_message_to_client')->middleware('auth')->middleware('role:admin');

Route::get('/client/{id}', [App\Http\Controllers\ClientController::class, 'index'])->name('client')->middleware('auth')->middleware('role:admin');
Route::get('/client_materials/{id}', [App\Http\Controllers\ClientController::class, 'clientMaterials'])->name('client_materials')->middleware('auth')->middleware('role:admin');
Route::get('/delete_cm/{id}', [App\Http\Controllers\ClientController::class, 'deleteClientMaterials'])->name('delete_cm')->middleware('auth')->middleware('role:admin');
Route::get('/client_questionnaire/{id}', [App\Http\Controllers\ClientController::class, 'clientQuestionnaire'])->name('client_questionnaire')->middleware('auth')->middleware('role:admin');
Route::get('/client_recommendations/{id}', [App\Http\Controllers\ClientController::class, 'clientRecommendations'])->name('client_recommendations')->middleware('auth')->middleware('role:admin');
Route::get('/client_nj/{id}', [App\Http\Controllers\ClientController::class, 'clientNutritionJournal'])->name('client_nj')->middleware('auth')->middleware('role:admin');
Route::post('/add_rec', [App\Http\Controllers\ClientController::class, 'addRecommendation'])->name('add_rec')->middleware('auth')->middleware('role:admin');
Route::get('/delete_rec/{id}', [App\Http\Controllers\ClientController::class, 'deleteRecommendation'])->name('delete_rec')->middleware('auth')->middleware('role:admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
