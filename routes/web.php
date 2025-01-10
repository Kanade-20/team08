<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CancerStatisticsController;
use App\Http\Controllers\HealthAdviceController;
use App\Http\Controllers\CancerKnowledgeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TermsOfServiceController;
use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\UserManagementController;

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

// 首页
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// ECharts 图表数据 API
Route::get('/api/cancer-statistics', [CancerStatisticsController::class, 'getData']);

// 静态页面
Route::view('/sdgs', 'sdgs');
Route::get('privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('terms-of-service', [TermsOfServiceController::class, 'termsOfService'])->name('terms-of-service');

// 癌症数据模块
Route::get('CancerStatistics', [CancerStatisticsController::class, 'index'])->name('CancerStatistics.index');
Route::get('CancerStatistics/filter', [CancerStatisticsController::class, 'filter'])->name('CancerStatistics.filter');
Route::get('CancerStatistics/{id}', [CancerStatisticsController::class, 'show'])->where('id', '[0-9]+')->name('CancerStatistics.show');

// 癌症知识库模块
Route::get('CancerKnowledge', [CancerKnowledgeController::class, 'index'])->name('CancerKnowledge.index');
Route::get('CancerKnowledge/{id}', [CancerKnowledgeController::class, 'show'])->where('id', '[0-9]+')->name('CancerKnowledge.show');
Route::get('CancerKnowledge/search', [CancerKnowledgeController::class, 'search'])->name('CancerKnowledge.search');

// 健康建议页面
Route::get('health-advice', [HealthAdviceController::class, 'index'])->name('health-advice.index');

// 仪表盘
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

// 用户模块
Auth::routes();

// 需要登录才能使用的功能
Route::middleware(['auth'])->group(function () {
    // 普通用户权限
    Route::get('userInfo/show/{id}', [UserInfoController::class, 'show'])->where('id', '[0-9]+')->name('userInfo.show');
    Route::get('userInfo/complete',[UserInfoController::class, 'complete'])->name('userInfo.complete');
    Route::get('userInfo/{id}/edit', [UserInfoController::class, 'edit'])->where('id', '[0-9]+')->name('userInfo.edit');
    Route::post('userInfo/store',[UserInfoController::class,'store'])->name('userInfo.store');
    Route::get('userInfo/query-history/{id}', [UserInfoController::class, 'showQueryHistory'])->where('id', '[0-9]+')->name('userInfo.query-history');
    Route::get('health-advice/{id}', [HealthAdviceController::class, 'show'])->where('id', '[0-9]+')->name('health-advice.show');

    // 经理权限
    Route::middleware('role:manager')->group(function () {
        Route::resource('admin/users', UserManagementController::class)->except('destroy');
        Route::get('CancerStatistics/{id}/edit', [CancerStatisticsController::class, 'edit'])->where('id', '[0-9]+')->name('CancerStatistics.edit');
        Route::patch('CancerStatistics/{id}', [CancerStatisticsController::class, 'update'])->where('id', '[0-9]+')->name('CancerStatistics.update');
        Route::get('CancerKnowledge/{id}/edit', [CancerKnowledgeController::class, 'edit'])->where('id', '[0-9]+')->name('CancerKnowledge.edit');
        Route::patch('CancerKnowledge/{id}', [CancerKnowledgeController::class, 'update'])->where('id', '[0-9]+')->name('CancerKnowledge.update');
    });

    // 管理员权限
    Route::middleware('role:admin')->group(function () {
        Route::resource('admin/users', UserManagementController::class);
        Route::get('CancerStatistics/create', [CancerStatisticsController::class, 'create'])->name('CancerStatistics.create');
        Route::post('CancerStatistics', [CancerStatisticsController::class, 'store'])->name('CancerStatistics.store');
        Route::delete('CancerStatistics/{id}', [CancerStatisticsController::class, 'destroy'])->where('id', '[0-9]+')->name('CancerStatistics.destroy');
        Route::get('CancerKnowledge/create', [CancerKnowledgeController::class, 'create'])->name('CancerKnowledge.create');
        Route::post('CancerKnowledge', [CancerKnowledgeController::class, 'store'])->name('CancerKnowledge.store');
        Route::delete('CancerKnowledge/{id}', [CancerKnowledgeController::class, 'destroy'])->where('id', '[0-9]+')->name('CancerKnowledge.destroy');
    });

});
