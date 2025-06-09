<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\InvoiceController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

//API
Route::middleware('auth_sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=> 'api', 'namespace' => 'App\Http\Controllers\API'], function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);

    Route::post('invoices/bulk', ['uses' => 'InvoiceController@bulkStore']);
});
