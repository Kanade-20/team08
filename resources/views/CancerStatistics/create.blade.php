@extends('app')

@section('title','新增癌症病例')

@section('create_theme', '新增癌症調查資料')

@section('create_contents')    
    新增癌症病例
    {!! Form::open(['url' => 'CancerStatistics/store'])!!}
        @include('CancerStatistics.form', ['submitButtonText'=>'新增癌症病例'])
    {!! Form::close() !!}
@endsection