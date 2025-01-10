@extends('layouts.app')

@section('title', '健康管理建议')

@push('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* 自定义样式 */
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 960px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.25rem;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        .card-footer {
            text-align: right;
        }

        .modal-header {
            background-color: #f7c823;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }

        .modal-footer .btn {
            background-color: #f7c823;
        }

        #advice-list li {
            font-size: 1.1rem;
        }

        .modal-content {
            border-radius: 10px;
        }

        .btn-close {
            background-color: #007bff;
        }
    </style>
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" defer></script>
@endpush

@section('content')
    <div class="container mt-5">
        @auth
             @if(session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
            @endif
            <!-- 用户基本信息展示 -->
            <div class="card mb-4">
                <div class="card-header">
                    用户信息
                </div>
                <div class="card-body">
                    <article>
                        <p><strong>姓名：</strong>{{ $user->name }}</p>
                        <p><strong>性别：</strong>{{ $user->gender == 'female' ? '女' : '男' }}</p>
                        <p><strong>年龄：</strong>{{ \Carbon\Carbon::parse($userInfo->birthdate)->age }} 岁</p>
                        <p><strong>病历：</strong>{{ $userInfo->medical_history}}</p>
                    </article>
                </div>
                <div class="card-footer">
                    <a href="{{ route('userInfo.edit', $user->id) }}" class="btn btn-primary">编辑信息</a>
                </div>
            </div>

            <!-- 健康建议展示 -->
            <div class="card">
                <div class="card-header">
                    个性化健康建议
                </div>
                <div class="card-body">
                    @if(is_array($advice) && count($advice) > 0)
                        <ul class="list-group" id="advice-list">
                            @foreach($advice as $suggestion)
                                <li class="list-group-item">{{ $suggestion }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>没有找到相关健康建议。</p>
                    @endif
                </div>
            </div>
        @endauth
    </div>
@endsection
