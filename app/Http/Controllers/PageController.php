<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // 隐私政策页面
    public function privacyPolicy()
    {
        return view('privacy-policy');
    }
}
