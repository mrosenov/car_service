<?php

use App\Models\CarMakesModel;
use App\Models\CarModelsModel;
use \App\Models\ClientInfoModel;
use \App\Models\CarInfoModel;

use App\Http\Controllers\ClientInfoController;
use \App\Http\Controllers\CarMakesController;
use \App\Http\Controllers\CarModelsController;
use \App\Http\Controllers\CarInfoController;

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
//Methods
Route::post('add_client', [ClientInfoController::class, 'store'])->name('add_client_form');
Route::patch('client/{client:id}/profile', [ClientInfoController::class, 'update'])->name('update_client_form');
Route::get('clients/{client:id}/delete', [ClientInfoController::class, 'destroy'])->name('delete_client');

//Car Makes
Route::get('makes', [CarMakesController::class, 'list_of_car_makes'])->name('car_makes_list');
Route::get('makes/{car_makes:id}', [CarMakesController::class, 'list_of_car_models'])->name('car_make_models');
Route::get('makes/{car_makes:id}/edit', [CarMakesController::class, 'car_make_info_view'])->name('car_make_info');
Route::get('makes_add', [CarMakesController::class, 'add_car_make_view'])->name('car_makes_add');
//Methods
Route::post('add_make', [CarMakesController::class, 'store'])->name('add_car_make_form');
Route::patch('makes/{car_makes:id}/edit',[CarMakesController::class,'update'])->name('update_car_make_form');

//Car Model
Route::get('models/add', [CarModelsController::class, 'add_car_model_view'])->name('car_model_add');
Route::get('models/{car_models:id}/edit', [CarModelsController::class, 'car_model_info_view'])->name('car_model_info');
//Methods
Route::post('models/add', [CarModelsController::class, 'store'])->name('car_models_add_form');
Route::patch('models/{car_models:id}/edit', [CarModelsController::class, 'update'])->name('update_car_model_form');


