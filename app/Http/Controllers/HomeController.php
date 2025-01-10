<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // 首页
    public function index(Request $request)
    {
        // 获取从路由传来的消息
        $errorMessage = $request->session()->get('error');
        
        // 返回首页视图并传递消息
        return view('home', compact('errorMessage'));
    }

}
