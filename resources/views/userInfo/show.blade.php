@extends('layouts.app')

@section('title', '用户信息')

@push('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

<style>
    /* 自定义用户信息容器 */
    .user-profile-container {
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    /* 调整每一项用户信息的布局 */
    .user-profile-container .row {
        background-color: #e1e1e1;
        padding: 15px;
        border-radius: 10px;
        border: 1px solid #ddd;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s, border 0.3s;
    }

    /* 调整警告信息框样式 */
    .alert-warning {
        font-size: 1.1rem;
        font-weight: bold;
    }

    .info {
        margin-bottom: 20px;
    }
    .col-8 {
        margin-bottom: 10px;
    }

    /* 错误提示样式 */
    .text-danger {
        font-size: 0.9rem;
        color: #f44336;
    }
</style>

@section('content')
    <div class="userInfo_show-container container my-5">
        <h1 class="text-center mb-4">用户信息</h1>
        <hr class="my-4">

        <!-- 返回按钮 -->
        <div class="text-start mb-3">
            <a href="{{ route('home') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> 返回
            </a>
        </div>

        <!-- 查看查询历史按钮 -->
        <div class="text-end">
            <a href="{{ route('userInfo.query-history', ['id' => auth()->user()->id]) }}" class="btn btn-primary">查看查询历史</a>
        </div>

        <!-- 用户信息表单 -->
        <div class="info">
            <!-- 姓名 -->
            <div class="col-4">
                <label for="name" class="form-label">姓名：</label>
            </div>
            <div class="col-8">
                <input type="text" class="form-control" id="name" name="name" value="{{ optional($userInfo->user)->name }}" disabled>
            </div>

            <!-- 电子邮箱 -->
            <div class="col-4">
                <label for="email" class="form-label">电子邮箱：</label>
            </div>
            <div class="col-8">
                <input type="email" class="form-control" id="email" name="email" value="{{ $userInfo->user->email }}" disabled>
            </div>
            
            <!-- 检查是否完善用户资料 -->
            @if(isset($userInfo) && $userInfo)
                <!-- 电话 -->
                <div class="col-4">
                    <label for="phone"><strong>电话：</strong></label>
                </div>
                <div class="col-8">
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $userInfo->phone ?? '未填写' }}">
                </div>

                <!-- 性别 -->
                <div class="col-4">
                    <label for="gender"><strong>性别：</strong></label>
                </div>
                <div class="col-8">
                    <input type="text" name="gender" id="gender" class="form-control" value="{{ $userInfo->gender ?? '未填写' }}">
                </div>

                <!-- 出生日期 -->
                <div class="col-4">
                    <label for="birthdate"><strong>出生日期：</strong></label>
                </div>
                <div class="col-8">
                    <input type="text" id="birthdate" class="form-control" value="{{ $userInfo->birthdate ?? '未填写' }}">
                </div>

                <!-- 病历 -->
                <div class="col-4">
                    <label for="medical_history"><strong>病历：</strong></label>
                </div>
                <div class="col-8">
                    <textarea name="medical_history" id="medical_history" class="form-control" rows="4">{{ $userInfo->medical_history ?? '未填写' }}</textarea>
                </div>
            @else
                <p>您的详细信息尚未填写。</p>
            @endif
        </div>

        <!-- 如果资料不完整，显示完善按钮 -->
        @if(isset($profile_incomplete) && $profile_incomplete)
            <div class="mt-3">
                <a href="{{ route('userInfo.complete') }}" class="btn btn-primary">完善您的个人信息</a>
            </div>
        @else
            <!-- 如果资料已填写，显示编辑按钮 -->
            <div class="mt-3">
                <a href="{{ route('userInfo.edit', Auth::id()) }}" class="btn btn-primary">编辑</a>
            </div>
        @endif
        </div>
    </div>

    <!-- JavaScript 处理提示信息 -->
    <script>
        @if(session('success'))
            alert('{{ session('success') }}');
        @elseif(session('error'))
            alert('{{ session('error') }}');
        @endif
    </script>
@endsection