<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('buildings/{id?}',[\App\Http\Controllers\OfficeRequestController::class,'getBuildings'])->name('get.buildings');
Route::get('floors/{id?}',[\App\Http\Controllers\OfficeRequestController::class,'getFloors'])->name('get.floors');
Route::get('offices/{id?}',[\App\Http\Controllers\OfficeRequestController::class,'getOffices'])->name('get.offices');
