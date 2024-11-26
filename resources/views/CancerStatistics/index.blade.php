@extends('app')

@section('title','台灣癌症調查資料')

@section('create_theme', '台灣癌症調查資料')

@section('create_contents')

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>診斷年份</th>
                    <th>性別</th>
                    <th>縣市別</th>
                    <th>癌症別</th>
                    <th>年齡標準化發生率 (每10萬人口)</th>
                    <th>癌症發生數</th>
                    <th>平均年齡</th>
                    <th>年齡中位數</th>
                    <th>粗率 (每10萬人口)</th>
                    <th>創建時間</th>
                    <th>更新時間</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cancerstatistics as $cancer)
                    <tr>
                        <td>{{$cancer->id}}</td>
                        <td>{{$cancer->cancer_diagnosis_year}}</td>
                        <td>{{$cancer->gender}}</td>
                        <td>{{$cancer->city_county}}</td>
                        <td>{{$cancer->cancer_type}}</td>
                        <td>{{$cancer->age_standardized_incidence_rate_who_2000}}</td>
                        <td>{{$cancer->cancer_cases}}</td>
                        <td>{{$cancer->average_age}}</td>
                        <td>{{$cancer->median_age}}</td>
                        <td>{{$cancer->crude_rate}}</td>
                        <td>{{$cancer->created_at}}</td>
                        <td>{{$cancer->updated_at}}</td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
@endsection