@extends('layouts.app')

@section('title', '台湾癌症统计数据')

@push('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .return {
        border: 0;
        border-radius: 5px;
    }
</style>

@section('content')
    <div>
        @guest
            <!-- 未登录时显示跳转到登录页面的按钮 -->
            <div class="alert alert-danger text-center" role="alert">
                <p>请登录以编辑癌症数据!</p>
                <a href="{{ route('login') }}" class="btn btn-primary">登录</a>
            </div>
        @endguest

        @auth
            <h1>编辑癌症数据</h1>
            <hr>
            <div class="text-end">
                <a class="return text-white btn btn-secondary mb-2" href="{{ route('CancerStatistics.index') }}">返回</a>
            </div>
            <div class="edit-form">
                {!! Form::model($CancerStatistics, ['method' => 'PATCH', 'action' => ['\App\Http\Controllers\CancerStatisticsController@update', $CancerStatistics -> id]]) !!}
                @include('CancerStatistics.form', ['submitButtonText' => '编辑'])
                {!! Form::close() !!}
            </div>
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