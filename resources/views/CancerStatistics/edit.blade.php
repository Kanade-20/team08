@extends('app')

@section('title','修改癌症病例')

@section('create_theme', '修改癌症調查資料')

@section('create_contents')    
    編輯一筆癌症病例
    {!! Form::model($cancerstatistic, ['method'=>'PATCH', 'action'=>['\App\Http\Controllers\CancerStatisticsController@update', $cancerstatistic->id]])!!}
        @include('CancerStatistics.form', ['submitButtonText'=>'修改癌症病例'])
    {!! Form::close() !!}
@endsection
