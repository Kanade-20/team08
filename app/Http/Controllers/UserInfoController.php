<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Hash;
use App\Models\QueryHistory;

class UserInfoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function complete()
    {
        $user = Auth::user();  // 获取当前登录用户
        return view('userInfo.complete', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取当前用户 ID
        $userId = Auth::id();
        $user = Auth::user(); // 获取当前用户信息

        // 定义表单验证规则
        $validated = $request->validate([
            'phone' => 'nullable|regex:/^1[3-9]\d{9}$/',
            'gender' => 'nullable|string|in:男,女,未知',
            'birthdate' => 'nullable|date',
            'medical_history' => 'nullable|string|max:500',
        ]);

        // 格式化出生日期，确保格式为 Y-m-d
        if ($request->has('birthdate') && $request->birthdate) {
            $validated['birthdate'] = \Carbon\Carbon::parse($request->birthdate)->toDateString();
        }

        // 创建新的用户信息记录并保存
        $userInfo = new UserInfo();
        $userInfo->user_id = $userId; // 设置关联的 user_id
        $userInfo->name = $user->name; // 从 User 表获取 name
        $userInfo->phone = $validated['phone'];
        $userInfo->gender = $validated['gender'];
        $userInfo->birthdate = $validated['birthdate'];
        $userInfo->medical_history = $validated['medical_history'];

        // 保存 userInfo
        $userInfo->save();

        // 返回成功提示
        return redirect()->route('userInfo.show', $userId)->with('success', '用户信息创建成功');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 获取当前用户信息（通过 user_id 关联），并加载 user 数据
        $userInfo = UserInfo::with('user')->where('user_id', $id)->first();

        // 如果没有找到用户信息，跳转到个人资料完善页面
        if (!$userInfo) {
            return redirect()->route('userInfo.complete');
        }

        if ($userInfo) {
            $userInfo->birthdate = \Carbon\Carbon::parse($userInfo->birthdate)->format('Y-m-d');
        }

        return view('userInfo.show', compact('userInfo'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取当前用户的 ID
        $userId = Auth::id();

        // 获取要编辑的用户信息
        $userInfo = UserInfo::where('user_id', $id)->first();

        // 如果没有找到用户信息，跳转到创建页面
        if (!$userInfo) {
            return redirect()->route('userInfo.complete');
        }

        // 确保当前用户只能编辑自己的信息
        if ($userInfo->user_id !== $userId) {
            return redirect()->route('home')->with('error', '无权限编辑该用户信息');
        }

        // 如果有信息，返回编辑页面
        return view('userInfo.edit', compact('userInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 获取当前登录用户的 ID
        $userId = Auth::id();

        // 查找要更新的用户信息
        $userInfo = UserInfo::where('user_id', $id)->first();

        // 如果没有找到用户信息，抛出权限错误
        if (!$userInfo) {
            abort(404, '没有找到您的信息');
        }

        // 确保当前用户只能编辑自己的信息
        if ($userInfo->user_id !== $userId) {
            return redirect()->route('home')->with('error', '无权限更新该用户信息');
        }

        // 获取当前用户对象
        $user = Auth::user();

        // 验证输入
        $validated = $request->validate([
            'phone' => 'nullable|regex:/^1[3-9]\d{9}$/',
            'gender' => 'nullable|string|in:male,female,unknown',
            'birthdate' => 'nullable|date',
            'medical_history' => 'nullable|string|max:500',
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'phone.regex' => '电话号码格式不正确, 限制为11位。',
            'gender.in' => "性别必须是 '男'、'女' 或 '未知' 其中之一。",
            'birthdate.date' => '出生日期格式不正确。',
            'medical_history.string' => '病历必须是字符串。',
            'medical_history.max' => '病历内容不能超过500个字符。',
            'password.min' => '密码长度不能少于8个字符。',
            'password.confirmed' => '密码和确认密码不匹配。',
        ]);

        // 格式化出生日期，确保格式为 Y-m-d
        if ($request->has('birthdate') && $request->birthdate) {
            $validated['birthdate'] = \Carbon\Carbon::parse($request->birthdate)->toDateString();
        }

        // 更新用户信息
        $userInfo->update($validated);

        // 如果填写了密码，更新 `users` 表中的密码
        if ($request->filled('password')) {
            $user = Auth::user();
            $user->password = Hash::make($request->password); // 加密密码
            $user->save();
        }

        // 确保在更新时包含 name 和 email 字段
        $userInfo->name = $user->name;  // 从 User 表获取 name
        $userInfo->email = $user->email; // 从 User 表获取 email

        // 保存用户更新后的信息
        $userInfo->save();

        // 返回更新后的用户信息页面
        return redirect()->route('userInfo.show', $id)->with('success', '用户信息更新成功');
    }
    public function showQueryHistory($userId)
    {
        // 获取用户的查询历史，通过外键user_id关联
        $queryHistories = QueryHistory::where('user_id', $userId)->get();
        
        // 返回查询历史视图
        return view('userInfo.query-history', compact('queryHistories'));
    }
}