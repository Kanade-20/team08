<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // 只允许管理员或自己查看自己的信息
    public function show($id)
    {
        // 如果是管理员或用户自己才能查看
        if (Auth::id() != $id && !Auth::user()->is_admin) {
            abort(403, '你没有权限查看这个用户的信息');
        }

        $user = User::findOrFail($id);

        // 返回用户信息视图
        return view('/user/profile', compact('user'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}