<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientInfoController;

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
Route::post('add_client', [ClientInfoController::class, 'store']);
