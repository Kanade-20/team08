@extends('layouts.app')

@section('title', '台湾癌症统计数据')

@push('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

@section('content')
    <div class="CS-create_container">
        @auth
            <h1>新增癌症数据</h1>
            <hr>
            <a class="return text-white btn btn-primary mb-2" href="{{ route('CancerStatistics.index') }}">返回</a>
            @include('message.list')
                {!! Form::open(['url' => 'CancerStatistics/store']) !!}
                    @include('CancerStatistics.form', ['submitButtonText' => '新增'])
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