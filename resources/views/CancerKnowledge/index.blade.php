@extends('layouts.app')

@section('title', '癌症知识库')

<style>
    /* 主容器样式 */
    .cancer-knowledge_container {
        padding: 30px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* 页面标题 */
    h1 {
        text-align: center;
        font-family: 'Arial', sans-serif;
        color: #4e73df;
    }

    /* 表单样式 */
    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        border-radius: 10px;
        padding: 15px;
        border: 1px solid #ccc;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 8px rgba(78, 115, 223, 0.4);
    }

    .form-select {
        border-radius: 10px;
        padding: 15px;
        border: 1px solid #ccc;
        transition: border-color 0.3s;
    }

    .form-select:focus {
        border-color: #4e73df;
        box-shadow: 0 0 8px rgba(78, 115, 223, 0.4);
    }

    /* 提交按钮样式 */
    .btn-container {
        text-align: center;
        margin-top: 20px;
    }

    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
        padding: 12px 25px;
        font-size: 16px;
        border-radius: 50px;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #375a7f;
        border-color: #375a7f;
    }

    /* 卡片样式 */
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 18px;
        color: #333;
        font-weight: 600;
    }

    .card-text {
        color: #555;
        font-size: 14px;
    }

    .btn {
        color: white;
        padding: 8px 20px;
        font-size: 14px;
        text-decoration: none;
    }

    .btn:hover {
        padding: 10px 22px;
    }

    .btn-link {
        padding-right: 25px;
        text-decoration: none; 
    }
    .create {
        margin-left: 1100px;
        margin-top: 30px;
        margin-bottom: 20px;
    }

    /* 响应式设计 */
    @media (max-width: 768px) {
        .cancer-knowledge-container {
            padding: 20px;
        }

        .form-control, .form-select {
            font-size: 14px;
            padding: 10px;
        }

        .btn-primary {
            font-size: 14px;
        }

        .card {
            margin-bottom: 20px;
        }
    }
</style>
@section('content')
    <div class="cancer-knowledge_container">
        <h1>癌症知识库</h1>
        <hr>
        <!-- 搜索表单 -->
        <form action="{{ route('CancerKnowledge.search') }}" method="GET" id="search-form" class="mb-4">
            @csrf
            <div class="form-group">
                <input type="text" id="search" name="search" class="form-control" placeholder="请输入标题/内容/关键字" value="{{ request('search') }}">
            </div>
            <div class="form-group">
                <select name="category" class="form-select">
                    <option value="">所有分类</option>
                    <option value="基础知识" {{ request('category') == '基础知识' ? 'selected' : '' }}>基础知识</option>
                    <option value="预防与筛查" {{ request('category') == '预防与筛查' ? 'selected' : '' }}>预防与筛查</option>
                    <option value="患者护理" {{ request('category') == '患者护理' ? 'selected' : '' }}>患者护理</option>
                    <option value="科研动态" {{ request('category') == '科研动态' ? 'selected' : '' }}>科研动态</option>
                </select>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">搜索</button>
        </form>
        <div class="create">
            @can('admin')
                @if (!$cancerknowledge->isEmpty())
                    <a href="{{ route('CancerKnowledge.create') }}" class="btn btn-primary btn-lg">+ 添加新知识</a>
                @endif
            @endcan
        </div>

        <!-- 加载结果区域 -->
        <div id="search-results">
            @if($cancerknowledge->isEmpty())
                <div class="text-center mt-5">
                    <img src="/images/icons/empty.png" alt="暂无数据" style="width: 150px; margin-bottom: 20px;">
                    <p class="text-muted">知识库中还没有数据，快来添加吧！</p>
                    @can('admin')
                        <a href="{{ route('CancerKnowledge.create') }}" class="btn btn-primary btn-lg">+ 添加新知识</a>
                    @endcan
                </div>
            @else
                <div class="row">
                    @foreach ($cancerknowledge as $item)
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <p class="card-text">{{ Str::limit($item->content, 100) }}</p>
                                    <p class="card-text">关键字: {{ $item->keywords }}</p>
                                    <a href="{{ route('CancerKnowledge.show', $item->id) }}" class="btn-link">详情</a>
                                    @can('manager')
                                    <a href="{{ route('CancerKnowledge.edit', $item->id) }}" class="btn-link">编辑</a>
                                    @elsecan('admin')
                                        <a href="{{ route('CancerKnowledge.edit', $item->id) }}" class="btn-link">编辑</a>
                                        <a href="{{ route('CancerKnowledge.destroy', $item->id) }}" class="btn-link" style="color: rgb(222, 3, 3);">删除</a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        @endif
    </div>
        {{ $cancerknowledge->links() }}
    </div>
@endsection