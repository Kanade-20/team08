<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // 导入 User 模型，如果你要显示用户列表

class AdminController extends Controller
{
    // 后台首页
    public function index()
    {
        return view('admin.index');
    }

    // 用户管理页面
    public function users()
    {
        $users = User::all(); // 获取所有用户
        return view('admin.users', compact('users'));
    }

    // 添加用户
    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.editUser', compact('user'));
    }
    
    // 删除用户
    public function deleteUser($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users');
    }
}
