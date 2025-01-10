@extends('layouts.app')

@section('title', $cancerknowledge->title)

@section('content')
<div class="container">
    <h1>详细知识展示</h1>
    <hr>
    <div class="mt-3 mb-3 text-end">
        <a href="{{ route('CancerKnowledge.index') }}" class="btn btn-secondary">返回</a>
        @can('manager')
            <a href="{{ route('CancerKnowledge.edit', $cancerknowledge) }}" class="operation btn btn-primary">编辑</a>
        @elsecan('admin')
            <a href="{{ route('CancerKnowledge.edit', $cancerknowledge) }}" class="operation btn btn-primary">编辑</a>   
            <form action="{{ route('CancerKnowledge.destroy', $cancerknowledge) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">删除</button>
            </form>
        @endcan
    </div>
    <article>
        <h2>{{ $cancerknowledge->title }}</h2>
        <p>{{ $cancerknowledge->content }}</p>
        @if($cancerknowledge->video_url)
            <video src="{{ $cancerknowledge->video_url }}" controls></video>
        @endif
    </article>

</div>
@endsection