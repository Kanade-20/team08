@extends('layouts.app')

@section('title', '癌症知识库')

@push('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@section('content')
<style>
    .submit-btn {
        margin-top: 20px;
        padding: 10px 20px;
        text-align: center;
    }

</style>
<div class="container">
    @guest
    <!-- 未登录时显示跳转到登录页面的按钮 -->
    <div class="alert alert-warning" role="alert">
        <p>请登录以新增癌症知识。</p>
        <a href="{{ route('login') }}" class="btn btn-primary">登录</a>
    </div>
    @endguest

    <h1>新增癌症知识</h1>
    <hr>
    <div class="mt-3 mb-3 text-end">
        <a href="{{ route('CancerKnowledge.index') }}" class="btn btn-secondary">返回</a>
    </div>
    @include('message.list')
    {!! Form::open(['url' => 'CancerKnowledge/store']) !!}
        @include('CancerKnowledge.form', ['submitButtonText' => '新增'])
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
@endsection
