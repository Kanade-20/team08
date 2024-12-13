<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class termsOfService extends Controller
{
    // 服务条款页面
    public function termsOfService()
    {
        return view('terms-of-service');
    }
}
