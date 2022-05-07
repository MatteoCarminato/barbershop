<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConditionPaymentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FormPaymentController;
use App\Http\Controllers\StateController;
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
    return view('welcome');
});

Route::resource('formpayment', FormPaymentController::class);
Route::resource('conditionpayment', ConditionPaymentController::class);
Route::resource('country', CountryController::class);
Route::resource('state', StateController::class);
Route::resource('city', CityController::class);
Route::resource('client', ClientController::class);


Route::get('getall/formpayment', [FormPaymentController::class, 'getAll'])->name('formpayment.getall');

