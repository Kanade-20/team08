@extends('layouts.app')

@section('title', '首页')

@section('home')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .container {
            margin-top: 120px;
        }
    </style>

    <!-- 首页内容 -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h1>欢迎来到癌症信息管理平台</h1>
                <p>本平台致力于为用户提供台湾地区的癌症相关数据、预防知识和健康管理建议，帮助大众了解癌症的防治措施。</p>
            </div>
        </div>
 
        <div class="row">
            <div class="col-md-4">
                <h3>癌症数据展示</h3>
                <p>提供台湾地区的癌症统计数据，包括发病率、死亡率等，帮助您了解癌症的发生趋势。</p>
            </div>
            <div class="col-md-4">
                <h3>健康管理建议</h3>
                <p>基于您的个人信息，提供个性化的健康管理建议，帮助您预防癌症。</p>
            </div>
            <div class="col-md-4">
                <h3>癌症知识库</h3>
                <p>提供关于癌症的详细介绍、治疗方法、预防措施等，帮助公众了解癌症。</p>
            </div>
        </div>
    </div>
    <!-- 引入JavaScript（例如Bootstrap的JavaScript功能）-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection