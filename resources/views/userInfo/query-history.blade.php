@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $user->name }} 的查询历史</h1>
    <hr>
    @if($queryHistories->isEmpty())
        <p>暂无查询历史。</p>
    @else
        <ul>
            @foreach($queryHistories as $history)
                <li>
                    <strong>搜索词：</strong>{{ $history->search_term }}<br>
                    <strong>分类：</strong>{{ $history->category }}<br>
                    <strong>日期：</strong>{{ $history->created_at }}
                </li>
            @endforeach
        </ul>
    @endif

    <!-- 返回按钮 -->
    <a href="{{ route('userInfo.show', ['id' => auth()->user()->id]) }}" class="btn btn-secondary">返回</a>
</div>
@endsection
