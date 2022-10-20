<?php

use App\Models\CarMakesModel;
use App\Models\CarModelsModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientInfoController;
use \App\Http\Controllers\CarMakesController;
use \App\Http\Controllers\CarModelsController;

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
Route::get('clients', [ClientInfoController::class, 'list_of_clients']);
Route::get('clients/add', [ClientInfoController::class, 'add_client_view']);
Route::get('clients/{client:id}/cars', [ClientInfoController::class, 'list_of_clients_cars']);
Route::post('add_client', [ClientInfoController::class, 'store']);

//Car Makes
Route::get('makes', function () {
    return view('cars/list_of_car_makes',[
        'car_makes' => CarMakesModel::all()
    ]);
});
Route::get('makes/{car_makes:id}', function (CarMakesModel $car_makes) {
    return view('cars/list_of_car_models',[
        'car_makes' => $car_makes->models,
    ]);
});
Route::get('makes_add', [CarMakesController::class, 'add_car_make_view']);
Route::post('add_make', [CarMakesController::class, 'store']);

//Car Model
Route::get('models/add', [CarModelsController::class, 'add_car_model_view']);
Route::post('models/add', [CarModelsController::class, 'store']);


