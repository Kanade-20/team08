@extends('app')

@section('title','新增癌症病例')

@section('create_theme', '新增癌症調查資料')

@section('create_contents')    
新增癌症病例
{!! Form::open(['url' => 'CancerStatistics/store'])!!}
    <div >
        {!! Form::label('cancer_diagnosis_year','診斷年份:') !!}
        {!! Form::text('cancer_diagnosis_year', null)!!}
    </div>
    <div>
        {!! Form::label('gender','性別:') !!}
        {!! Form::text('gender', null)!!}
    </div>
    <div>
        {!! Form::label('city_county','縣市別:') !!}
        {!! Form::text('city_county', null)!!}
    </div>
    <div>
        {!! Form::label('cancer_type','癌症別:') !!}
        {!! Form::text('cancer_type', null)!!}
    </div>
    <div>
        {!! Form::label('age_standardized_incidence_rate_who_2000','年齡標準化發生率 (每10萬人口):') !!}
        {!! Form::text('age_standardized_incidence_rate_who_2000', null)!!}
    </div>
    <div>
        {!! Form::label('cancer_cases','癌症發生數:') !!}
        {!! Form::text('cancer_cases', null)!!}
    </div>

    <div>
        {!! Form::label('average_age','平均年齡:') !!}
        {!! Form::text('average_age', null)!!}
    </div>
    <div>
        {!! Form::label('median_age','年齡中位數:') !!}
        {!! Form::text('median_age', null)!!}
    </div>
    <div>
        {!! Form::label('crude_rate','粗率 (每10萬人口):') !!}
        {!! Form::text('crude_rate', null)!!}
    </div>
    <div>
        {!! Form::submit("新增癌症資料", ['class'=>'button button2']) !!}
    </div>
{!! Form::close() !!}
@endsection