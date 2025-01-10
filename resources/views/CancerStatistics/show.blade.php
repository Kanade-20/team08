@extends('layouts.app')

@section('title', '癌症数据详情')

<style>
    .cs-show_container {
        padding: 50px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .operation {
        margin-right: 15px;
    }

    .data-list {
        background-color: #e1e1e1;
        border: 1px solid #ddd;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s, border 0.3s;
        list-style-type: none;
        padding: 15px;
        border-radius: 8px;
    }

    .data-list li {
        font-size: 22px;
        margin: 12px 0;
    }

    .data-list li strong {
        color: #007bff;
        font-weight: bold;
        margin-left: 15px;
    }

</style>

@section('content')
    <div class="cs-show_container">
        <h1>详细数据展示</h1>
        <hr>
        <div class="mt-3 mb-3 text-end">
            <a href="{{ route('CancerStatistics.index') }}" class="operation btn btn-secondary">返回列表</a>
            @can('manager')
                <a href="{{ route('CancerStatistics.edit', $CancerStatistics) }}" class="operation btn btn-primary">编辑</a>
            @elsecan('admin')
                <a href="{{ route('CancerStatistics.edit', $CancerStatistics) }}" class="operation btn btn-primary">编辑</a>
                <form action="{{ route('CancerStatistics.destroy', $CancerStatistics) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">删除</button>
                </form>
            @endcan
        </div>
        <ul class="data-list">
            <li><strong>癌症诊断年份：</strong>{{ $CancerStatistics->cancer_diagnosis_year }}</li>
            <li><strong>性别：</strong>{{ $CancerStatistics->gender }}</li>
            <li><strong>县市别：</strong>{{ $CancerStatistics->city }}</li>
            <li><strong>癌症类型：</strong>{{ $CancerStatistics->cancer_type }}</li>
            <li><strong>年龄标准化发生率（每10万人口）：</strong>{{ $CancerStatistics->age_standardized_incidence_rate }}</li>
            <li><strong>癌症的发生数量：</strong>{{ $CancerStatistics->cancer_cases }}</li>
            <li><strong>平均年龄：</strong>{{ $CancerStatistics->average_age }}</li>
            <li><strong>年龄中位数：</strong>{{ $CancerStatistics->median_age }}</li>
            <li><strong>粗率（每10万人口）：</strong>{{ $CancerStatistics->crude_rate }}</li>
        </ul>
    </div>
@endsection
