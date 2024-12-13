<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsOfServiceController extends Controller
{
    //服务条款页面
    public function TermsOfService()
    {
        return view('terms-of-service');
    }
}
