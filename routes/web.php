<?php

use Illuminate\Support\Facades\Route;
use APP\Http\Controllers\Cancer_statisticsController;

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

Route::get('/sdg3', function () {
    return view('sdg3');
});

Route::get('/sdgs', function () {
    return view('sdgs');
});

Route::get('Cancer_statistics', [Cancer_statisticsController::class,'index']);