<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\UserInfo;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Paginator::useBootstrap();

        // 注册一个视图 Composer，使得所有视图都能访问到 $user
        View::composer('*', function ($view) {
            $view->with('user', Auth::user());  // 将当前登录的用户传递给所有视图
        });

        View::composer('*', function ($view) {
            // 获取当前用户
            $user = Auth::user();
        
            // 如果用户已登录，查询对应的用户信息
            $userInfo = $user ? UserInfo::where('user_id', $user->id)->first() : null;
        
            // 将用户信息传递给所有视图
            $view->with('userInfo', $userInfo);
        });
    }
}