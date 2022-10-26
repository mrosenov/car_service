<?php

use App\Models\CarMakesModel;
use App\Models\CarModelsModel;
use \App\Models\ClientInfoModel;
use \App\Models\CarInfoModel;

use App\Http\Controllers\ClientInfoController;
use \App\Http\Controllers\CarMakesController;
use \App\Http\Controllers\CarModelsController;
use \App\Http\Controllers\CarInfoController;
use \App\Http\Controllers\ServiceTypeController;
use \App\Http\Controllers\ServiceSubTypeController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//Clients
Route::get('clients', [ClientInfoController::class, 'list_of_clients'])->name('clients');
Route::get('client/{client:id}/profile', [ClientInfoController::class, 'client_info_view'])->name('profile');
Route::get('clients/add', [ClientInfoController::class, 'add_client_view'])->name('client_add');
Route::get('client/{carinfo:ownerID}/cars', [CarInfoController::class, 'list_client_cars'])->name('client_cars');
Route::get('cars/{carinfo:id}/edit', [CarInfoController::class, 'edit_client_car_view'])->name('edit_client_car');
//Methods
Route::post('add_client', [ClientInfoController::class, 'store'])->name('add_client_form');
Route::post('client/{client:id}/profile', [ClientInfoController::class, 'add_client_car'])->name('add_client_car_form');
Route::patch('client/{client:id}/profile', [ClientInfoController::class, 'update'])->name('update_client_form');
Route::get('clients/{client:id}/delete', [ClientInfoController::class, 'destroy'])->name('delete_client');
Route::patch('cars/{carinfo:id}/edit', [CarInfoController::class, 'update'])->name('update_client_car_form');
Route::get('cars/{carinfo:id}/delete', [CarInfoController::class, 'destroy'])->name('delete_client_car');

//Car_Makes
Route::get('makes', [CarMakesController::class, 'list_of_car_makes'])->name('car_makes_list');
Route::get('makes/{car_makes:id}', [CarMakesController::class, 'list_of_car_models'])->name('car_make_models');
Route::get('makes/{car_makes:id}/edit', [CarMakesController::class, 'car_make_info_view'])->name('car_make_info');
Route::get('makes_add', [CarMakesController::class, 'add_car_make_view'])->name('car_makes_add');
//Methods
Route::post('add_make', [CarMakesController::class, 'store'])->name('add_car_make_form');
Route::patch('makes/{car_makes:id}/edit',[CarMakesController::class,'update'])->name('update_car_make_form');

//Car_Model
Route::get('models/add', [CarModelsController::class, 'add_car_model_view'])->name('car_model_add');
Route::get('models/{car_models:id}/edit', [CarModelsController::class, 'car_model_info_view'])->name('car_model_info');
//Methods
Route::post('models/add', [CarModelsController::class, 'store'])->name('car_models_add_form');
Route::patch('models/{car_models:id}/edit', [CarModelsController::class, 'update'])->name('update_car_model_form');

//Service_Types
Route::get('services', [ServiceTypeController::class, 'list_service_type_view'])->name('list_of_services');
Route::get('services/{service_type:id}', [ServiceSubTypeController::class, 'list_service_subtypes_view'])->name('list_of_service_subtypes');
Route::get('service/type/add', [ServiceTypeController::class, 'service_type_view'])->name('service_type_add');
Route::get('service/type/{type:id}/edit', [ServiceTypeController::class, 'edit_service_type_view'])->name('service_type_edit');
Route::get('service/subtype/add', [ServiceSubTypeController::class, 'service_subtype_view'])->name('service_subtype_add');
Route::get('service/subtype/{subtype:id}/edit', [ServiceSubTypeController::class, 'edit_service_subtype_view'])->name('service_subtype_edit');
//Methods
Route::post('service_type/add', [ServiceTypeController::class, 'store'])->name('service_type_add_form');
Route::post('service/subtype/add', [ServiceSubTypeController::class, 'store'])->name('service_subtype_add_form');
Route::patch('service/type/{type:id}/edit', [ServiceTypeController::class, 'update'])->name('service_type_edit_form');
Route::get('service/type/{type:id}/delete', [ServiceTypeController::class, 'destroy'])->name('service_type_delete');
Route::patch('service/subtype/{subtype:id}/edit', [ServiceSubTypeController::class, 'update'])->name('service_subtype_edit_form');
Route::get('service/subtype/{subtype:id}/delete', [ServiceSubTypeController::class, 'destroy'])->name('service_subtype_delete');

