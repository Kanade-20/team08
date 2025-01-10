@extends('layouts.app')

@section('title', '用户信息')

@push('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

@section('content')
    <div class="userInfo_complete-container">      
        @auth
            <h1>用户信息</h1>
            <hr>
            <a class="return text-white btn btn-primary mb-2" href="{{ route('home') }}">返回</a>
            @if(session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
            @endif
            @include('message.list')
            <!-- 如果没有填写完整信息，显示提示 -->
            @if(is_null($user->phone) || is_null($user->gender) || is_null($user->birthdate))
                <div class="alert alert-warning text-center mt-3">
                    请先填写完整信息后再提交。
                </div>
            @endif
            {!! Form::open(['url' => 'userInfo/store']) !!}
                @include('userInfo.form', ['submitButtonText' => '保存'])
            {!! Form::close() !!}
        
            <!-- 如果有錯誤，使用 JavaScript 彈窗顯示錯誤訊息 -->
            @if ($errors->any())
                <script>
                    window.onload = function() {
                        let errorMessages = @json($errors->all());
                        if (errorMessages.length > 0) {
                            alert("表单错误：\n" + errorMessages.join("\n"));
                        }
                    };
                </script>
            @endif
        @endauth
    </div>
@endsection
