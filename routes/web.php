<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CancerStatisticsController;
use App\Http\Controllers\HealthAdviceController;
use App\Http\Controllers\CancerKnowledgeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\termsOfService;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/sdg3', function () {
    return view('sdg3');
});

Route::get('/sdgs', function () {
    return view('sdgs');

});

// 首页
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

// 癌症数据页面
Route::get('CancerStatistics',[CancerStatisticsController::class, 'index'])->name('CancerStatistics.index');
// 新增癌症數據
Route::get('CancerStatistics/create',[CancerStatisticsController::class, 'create'])->name('CancerStatistics.create');
// 儲存癌症數據
Route::post('CancerStatistics/store',[CancerStatisticsController::class,'store'])->name('CancerStatistics.store');
// 查询癌症数据
Route::get('CancerStatistics/{id}', [CancerStatisticsController::class, 'show'])->where('id', '[0-9]+')->name('CancerStatistics.show');
// 编辑癌症数据
Route::get('CancerStatistics/{id}/edit', [CancerStatisticsController::class, 'edit'])->where('id', '[0-9]+')->name('CancerStatistics.edit');
// 删除癌症数据
Route::delete('CancerStatistics/delete/{id}', [CancerStatisticsController::class, 'destroy'])->where('id', '[0-9]+')->name('CancerStatistics.destroy');

// 用户登录与注册页面
Auth::routes();
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 健康管理建议页面
Route::get('/health-advice', [HealthAdviceController::class, 'index']);

// 癌症知识库页面
Route::get('/cancer-knowledge', [CancerKnowledgeController::class, 'index']);

// 隐私政策页面
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy.policy');

// 服务条款页面
Route::get('/terms-of-service', [PageController::class, 'termsOfService'])->name('terms.of.service');

// 后台首页路由
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');

// 后台其他路由，如用户管理、数据管理等
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users')->middleware('auth');Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/', [AdminController::class, 'dashboard']);
    // 其他管理功能路由，如：
    // Route::get('/manage-users', [AdminController::class, 'manageUsers']);
    // Route::get('/manage-data', [AdminController::class, 'manageData']);
});
// 编辑和删除用户
Route::get('/admin/users/edit/{id}', [AdminController::class, 'editUser'])->name('admin.editUser');
Route::get('/admin/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');