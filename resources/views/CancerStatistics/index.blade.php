@extends('layouts.app')

@section('title', '台湾癌症统计数据')

@section('CancerStatistics_index')
<link rel="stylesheet" href="{{ mix('css/table.css') }}">
<div class="container">
    <h1>台湾地区癌症统计数据</h1>
    <hr>
    <!-- 癌症数据表格 -->
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>cancer_diagnosis_year(癌症診斷的年份)</th>
                <th>gender(性別（例如：男性、女性、全等）)</th>
                <th>city(縣市別)</th>
                <th>cancer_type(癌症類型（例如：口腔、胃等）)</th>
                <th>age_standardized_incidence_rate(年齡標準化發生率 (WHO 2000 世界標準人口 每10萬人口))</th>
                <th>cancer_cases(癌症的發生數量)</th>
                <th>average_age(平均年齡)</th>
                <th>median_age(年齡中位數)</th>
                <th>crude_rate(粗率 (每10萬人口))</th>
                <th>created_at(創建時間)</th>
                <th>updated_at(更新時間)</th>
                <th>操作一</th>
                <th>操作二</th>
                <th>操作三</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($CancerStatistics as $index => $cancer)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{$cancer->cancer_diagnosis_year}}</td>
                    <td>{{$cancer->gender}}</td>
                    <td>{{$cancer->city}}</td>
                    <td>{{$cancer->cancer_type}}</td>
                    <td>{{$cancer->age_standardized_incidence_rate}}</td>
                    <td>{{$cancer->cancer_cases}}</td>
                    <td>{{$cancer->average_age}}</td>
                    <td>{{$cancer->median_age}}</td>
                    <td>{{$cancer->crude_rate}}</td>
                    <td>{{$cancer->created_at}}</td>
                    <td>{{$cancer->updated_at}}</td>
                    <td><a href="{{ route('CancerStatistics.show',['id' => $cancer->id]) }}">詳情</a></td>
                    <td><a href="{{ route('CancerStatistics.edit',['id' => $cancer->id]) }}">編輯</a></td>
                    <td>
                        <form action="{{ url('CancerStatistics/delete',['id' => $cancer->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>   
    </table>
</div>
@endsection