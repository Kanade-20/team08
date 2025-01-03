<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CancerStatisticsController;
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
    return view('CancerStatistics.presentation_sdgs');
});

Route::get('/sdgs', function () {
    return view('intro_sdgs');
});

Route::post('CancerStatistics/store',[CancerStatisticsController::class, 'store'])->name('CancerStatistics.store');
Route::get('CancerStatistics/create',[CancerStatisticsController::class, 'create'])->name('CancerStatistics.create');
Route::get('CancerStatistics',[CancerStatisticsController::class, 'index'])->name('CancerStatistics.index');
Route::get('CancerStatistics/{id}',[CancerStatisticsController::class, 'show'])->where('id','[0-9]+')->name('CancerStatistics.show');
Route::get('CancerStatistics/{id}/edit',[CancerStatisticsController::class, 'edit'])->where('id','[0-9]+')->name('CancerStatistics.edit');
Route::patch('CancerStatistics/update/{id}',[CancerStatisticsController::class, 'update'])->where('id','[0-9]+')->name('CancerStatistics.update');
Route::delete('CancerStatistics/delete/{id}',[CancerStatisticsController::class, 'destroy'])->where('id','[0-9]+')->name('CancerStatistics.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
