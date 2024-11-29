@extends('app')

<link rel="stylesheet" href="{{ mix('css/table.css') }}">

@section('title','Cancer data detail')

@section('CancerStatistics_index')
<table>
    <thead>
        <tr>
            <th>id</th>
            <td style="background-color: #b3afaf;color: black">{{$CancerStatistics->id}}</td>
        </tr>
        <tr>
            <th>cancer_diagnosis_year(癌症診斷的年份)</th>
            <td style="background-color: #b3afaf;color: black">{{$CancerStatistics->cancer_diagnosis_year}}</td>
        </tr>
        <tr>
            <th>gender(性別（例如：男性、女性、全等）)</th>
            <td style="background-color: #b3afaf;color: black">{{$CancerStatistics->gender}}</td>
        </tr>
        <tr>
            <th>city(縣市別)</th>
            <td style="background-color: #b3afaf;color: black">{{$CancerStatistics->city}}</td>
        </tr>
        <tr>
            <th>cancer_type(癌症類型（例如：口腔、胃等）)</th>
            <td style="background-color: #b3afaf;color: black">{{$CancerStatistics->cancer_type}}</td>    
        </tr>    
        <tr>
            <th>age_standardized_incidence_rate(年齡標準化發生率 (WHO 2000 世界標準人口 每10萬人口))</th>
            <td style="background-color: #b3afaf;color: black">{{$CancerStatistics->age_standardized_incidence_rate}}</td>            
        </tr>
        <tr>
            <th>cancer_cases(癌症的發生數量)</th>
            <td style="background-color: #b3afaf;color: black">{{$CancerStatistics->cancer_cases}}</td>
        </tr>
        <tr>
            <th>average_age(平均年齡)</th>
            <td style="background-color: #b3afaf;color: black">{{$CancerStatistics->average_age}}</td>            
        </tr>
        <tr>
            <th>median_age(年齡中位數)</th>
            <td style="background-color: #b3afaf;color: black">{{$CancerStatistics->median_age}}</td>            
        </tr>
        <tr>
            <th>crude_rate(粗率 (每10萬人口))</th>
            <td style="background-color: #b3afaf;color: black">{{$CancerStatistics->crude_rate}}</td>            
        </tr>
        <tr>
            <th>created_at(創建時間)</th>
            <td style="background-color: #b3afaf;color: black">{{$CancerStatistics->created_at}}</td>            
        </tr>
        <tr>
            <th>updated_at(更新時間)</th>
            <td style="background-color: #b3afaf;color: black">{{$CancerStatistics->updated_at}}</td>            
        </tr>
    </thead>
</table>
@endsection