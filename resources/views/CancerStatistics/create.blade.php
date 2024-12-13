@extends('layouts.app')

@section('title', '台湾癌症统计数据')

@section('CancerStatistics_create')
<style>
    .CancerStatistics_create {
        margin-top: 120px;
    }
</style>
<div class="CancerStatistics_create">
    <h1>新增台灣癌症統計數據表單</h1>
    <hr>
    {!! Form::open(['url' => 'CancerStatistics/store']) !!}
        <div class="form-group">
            {!! Form::label('cancer_diagnosis_year', '癌症診斷的年份:') !!}
            {!! Form::text('cancer_diagnosis_year',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('gender', '性別（例如：男性、女性、全等）:') !!}
            {!! Form::text('gender',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('city', '縣市別:') !!}
            {!! Form::text('city',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cancer_type', '癌症類型（例如：口腔、胃等）:') !!}
            {!! Form::text('cancer_type',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('age_standardized_incidence_rate', '年齡標準化發生率 (WHO 2000 世界標準人口 每10萬人口):') !!}
            {!! Form::text('age_standardized_incidence_rate',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cancer_cases', '癌症的發生數量:') !!}
            {!! Form::text('cancer_cases',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('average_age', '平均年齡:') !!}
            {!! Form::text('average_age',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('median_age', '年齡中位數:') !!}
            {!! Form::text('median_age',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('crude_rate', '粗率 (每10萬人口):') !!}
            {!! Form::text('crude_rate',null,['class' => 'form-control']) !!}
        </div>
        <button type="submit">提交</button>
</div>
@endsection