@extends('app')

@section('title','台灣癌症調查資料')

@section('create_theme', '台灣癌症調查資料')

@section('create_contents')
        <a href={{ route('CancerStatistics.create');}}>新增癌症調查資料</a>
        <table class="bordered">
            <thead>
                <tr>
                    <th>診斷年份</th>
                    <th>性別</th>
                    <th>縣市別</th>
                    <th>癌症別</th>
                    <th>癌症發生數</th>
                    <th>平均年齡</th>
                    <th>年齡中位數</th>
                    <th>創建時間</th>
                    <th>更新時間</th>
                    <th>操作1</th>
                    <th>操作2</th>
                    <th>操作3</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($cancerstatistics as $cancer)
                    <tr>
                        <td>{{$cancer->cancer_diagnosis_year}}</td>
                        <td>{{$cancer->gender}}</td>
                        <td>{{$cancer->city_county}}</td>
                        <td>{{$cancer->cancer_type}}</td>
                        <td>{{$cancer->cancer_cases}}</td>
                        <td>{{$cancer->average_age}}</td>
                        <td>{{$cancer->median_age}}</td>
                        <td>{{$cancer->created_at}}</td>
                        <td>{{$cancer->updated_at}}</td>
                        <td><a href="{{ route('CancerStatistics.show', ['id' => $cancer->id]) }}">顯示</a></td>
                        <td><a href="{{ route('CancerStatistics.show', ['id' => $cancer->id]) }}">修改</a></td>
                        <td>
                            <form action="{{ url('/CancerStatistics/delete', ['id' => $cancer->id]) }}" method="post">
                                <input class="button button2" type="submit" value="刪除" />
                                @method('delete')
                                @csrf
                            </form>
                        </td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
@endsection