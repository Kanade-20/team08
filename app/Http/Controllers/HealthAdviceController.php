<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HealthAdviceService;
use Illuminate\Support\Facades\Auth;
use App\Models\QueryHistory;

class HealthAdviceController extends Controller
{
    protected $healthAdviceService;

    public function __construct(HealthAdviceService $healthAdviceService)
    {
        $this->healthAdviceService = $healthAdviceService;
    }

    public function index(Request $request)
    {
        $user = Auth::user(); // 获取当前登录的用户

        // 如果用户未登录，跳转到登录页面并设置提示信息
        if (!$user) {
            return redirect()->route('login')->with('warning', '请登录后继续');
        }
    
        // 获取用户的个人信息
        $userInfo = $user->userInfo; // 获取 UserInfo 对象
    
        // 如果用户没有完善个人信息，跳转到完善个人信息页面
        if (!$userInfo) {
            return redirect()->route('userInfo.complete', ['id' => $user->id])
                             ->with('warning', '请完善个人资料后继续');
        }
    
        // 从 userInfo 中提取必要的信息
        $gender = $userInfo->gender;
        $birthdate = $userInfo->birthdate;
        $medical_history = $userInfo->medical_history;

        // 获取用户的健康建议
        $advice = $this->healthAdviceService->generateAdvice($gender, $birthdate, $medical_history); // 传递提取的字段
    
        // 确保 $advice 是数组类型
        if (!is_array($advice)) {
            $advice = [];
        }
    
        // 返回视图并传递 $advice 变量
        return view('health-advice.index', compact('advice'));
    }

    // 处理获取健康建议的请求
    public function show(Request $request, $id)
    {
        $user = Auth::user(); // 获取当前登录的用户

        // 如果用户未登录，跳转到登录页面并设置提示信息
        if (!$user) {
            return redirect()->route('login')->with('error', '请登录后继续');
        }

        // 检查是否是当前登录用户
        if ($user->id !== (int)$id) {
            return redirect()->route('home')->with('error', '未经授权的访问');
        }

        // 获取用户的资料
        $userInfo = $user->userInfo;

        // 如果资料不完整，跳转到填写页面
        if (!$userInfo) {
            session()->flash('profile_incomplete', true);
            return redirect()->route('userInfo.complete', ['id' => $user->id])->with('warning', '请完善个人资料后继续');
        }

        // 从 userInfo 中提取必要的信息
        $gender = $userInfo->gender;
        $birthdate = $userInfo->birthdate;
        $medical_history = $userInfo->medical_history;

        // 获取查询历史并生成健康建议
        $queryHistory = QueryHistory::where('user_id', $user->id)->pluck('query_content')->toArray();
        
        // 获取用户的最新健康建议
        $advice = $this->healthAdviceService->generateAdvice($gender, $birthdate, $medical_history); // 先基于用户信息生成建议
        $advice = array_merge($advice, $this->healthAdviceService->generateAdviceFromQueryHistory($queryHistory)); // 然后将查询历史生成的建议合并


        // 确保 $advice 是一个数组
        if (!is_array($advice)) {
            $advice = [];
        }

        // 如果没有建议，生成并保存新的建议
        if (!$advice) {
            $advice = $this->healthAdviceService->generateAdvice($gender, $birthdate, $medical_history);
            // 保存健康建议
            $user->healthAdvices()->create([
                'advice' => implode(' ', $advice), // 将数组转换为字符串保存
            ]);
        } else {
            // 如果已经有健康建议，直接使用
            $advice = explode(' ', $user->healthAdvices->first()->advice); // 将建议字符串转换为数组
        }

        // 返回健康建议视图
        return view('health-advice.show', compact('advice', 'user'));
    }
}