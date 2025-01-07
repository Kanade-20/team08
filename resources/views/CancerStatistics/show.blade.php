@extends('app')

@section('title','癌症病例')

@section('create_theme', '所選的癌症病例')

@section('create_contents')
        <table class="bordered">
            <tbody >
                <tr>
                    <td>ID:{{$cancerstatistic->id}}</td>
                </tr>
                <tr>
                    <td>診斷年份:{{$cancerstatistic->cancer_diagnosis_year}}</td>
                </tr>
                <tr>    
                    <td>性別:{{$cancerstatistic->gender}}</td>
                </tr>
                <tr>
                    <td>縣市別:{{$cancerstatistic->city_county}}</td>
                </tr>
                <tr>
                    <td>癌症別:{{$cancerstatistic->cancer_type}}</td>
                </tr>
                <tr>
                    <td>年齡標準化發生率 (每10萬人口):{{$cancerstatistic->age_standardized_incidence_rate_who_2000}}</td>
                </tr>
                <tr>    
                    <td>癌症發生數:{{$cancerstatistic->cancer_cases}}</td>
                </tr>
                <tr>
                    <td>平均年齡:{{$cancerstatistic->average_age}}</td>
                </tr>
                    <td>年齡中位數:{{$cancerstatistic->median_age}}</td>
                </tr>    
                <tr>
                    <td>粗率 (每10萬人口):{{$cancerstatistic->crude_rate}}</td>
                </tr>     
            </tbody>
        </table>
        @can('admin')
        <div class="center-form">
            <form action="{{ url('/CancerStatistics/delete', ['id' => $cancerstatistic->id]) }}" method="post">
                <input class="button button2" type="submit" value="刪除" />
                @method('delete')
                @csrf
            </form>
        </div>
        @endcan    
@endsection