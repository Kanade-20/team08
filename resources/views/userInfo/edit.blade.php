@extends('layouts.app')

@section('title', '修改用户信息')

@push('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .return {
        width: 70px;
        height: 50px;
        border: 0;
        border-radius: 5px;
    }
</style>

@section('content')
    <div class="userInfo_edit-container container my-5">
        @auth
            <h1>用户信息</h1>
            <hr>
            <a class="return text-white btn btn-primary mb-2" href="{{ route('home') }}">返回</a>
            @include('message.list')
            {!! Form::open(['url' => 'userInfo/update']) !!}
                @include('userInfo.form', ['submitButtonText' => '编辑'])
                <!-- 修改密码 -->
                @if($showPasswordFields ?? false)
                <div class="form-group">
                    {!! Form::label('password', '修改密码:') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', '确认密码:') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @endif
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