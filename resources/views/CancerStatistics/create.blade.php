@extends('app')

@section('title','新增癌症病例')

@section('create_theme', '新增癌症調查資料')

@section('create_contents')    
    <p class="text">新增癌症病例</p>
    @include('message.error')
    {!! Form::open(['url' => 'CancerStatistics/store','class' => 'custom-form'])!!}
        @include('CancerStatistics.form', ['submitButtonText'=>'新增癌症病例'])
    {!! Form::close() !!}
@endsection