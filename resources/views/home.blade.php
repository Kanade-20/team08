@extends('layouts.app')

@section('title', '首页')

{{-- 引入编译后的 JS 文件 --}}
<script src="{{ mix('js/app.js') }}" defer></script>

<style>
    /* 背景容器 */
    .home_container {
        background-color: #dbdada;
        padding: 20px 20px;
        border-radius: 2rem;
        box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.5);
    }

    /* 头部标题区域 */
    .col-md-12 {
        text-align: center;
        padding: 50px 20px;
        border-radius: 15px;
        margin-bottom: 20px;
    }

    .welcome_word {
        background-image: url('{{ asset('images/pictures/heartbeat.gif') }}');
        background-size: contain;
        background-position: left center;
        background-repeat: no-repeat;
    }

    .col-md-12 h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .lead {
        font-size: 1.25rem;
        line-height: 1.8;
    }

    /* 图表容器 */
    #app {
        margin-top: 50px;
    }

    .health {
        max-height: 500px;
        text-align: center;
    }

    .knowledge {
        text-align: center;
    }

    /* 响应式设计 */
    @media (max-width: 768px) {
        .col-md-12 h1 {
            font-size: 2.5rem;
        }

        .lead {
            font-size: 1.1rem;
        }
    }
</style>

@section('content')
<div class="home_container">
    <!-- 如果有 errorMessage，显示警告 -->
    @if(session('error'))
        <script type="text/javascript">
            alert("{{ session('error') }}");
        </script>
    @endif
    <div class="welcome_word col-md-12 text-center">
        <h1>欢迎来到癌症信息管理平台</h1>
        <hr class="my-4" style="border-color: #ffffff; width: 40%; margin: 0 auto;">
        <p class="lead">本平台致力于为用户提供台湾地区的癌症相关数据、预防知识和健康管理建议，帮助大众了解癌症的防治措施。</p>
        <p class="lead">本平台启发源于WHO：<a href="/sdgs">十七个可持续发展目标</a></p>
        <p class="lead">以下为您介绍本平台提供的功能：</p>
    </div>

    <div class="col-md-12 text-center">
        <h2>癌症数据展示</h2>
        <hr class="my-4" style="border-color: #ffffff; width: 40%; margin: 0 auto;">
        <p class="lead">提供台湾地区的癌症统计数据，包括发病率、粗率等，帮助您了解癌症的发生趋势。</p>
        <p class="card-text">如需了解详情，请点击导航栏中的“癌症数据”！</p>
        <div id="app">
            {{-- Vue组件渲染的图表 --}}
            <chart-component></chart-component>
        </div>
    </div>

    <div class="col-md-12 text-center">
        <h2>健康管理建议</h2>
        <hr class="my-4" style="border-color: #ffffff; width: 40%; margin: 0 auto;">
        <p class="lead">基于您的个人信息，提供个性化的健康管理建议，帮助您预防癌症。</p>
        <p class="card-text">如需了解详情，请点击导航栏中的“健康管理建议”！</p>
        <img class="health" src="{{ asset("images/pictures/health.jpg") }}" alt="health">
    </div>

    <div class="col-md-12 text-center">
        <h2>癌症知识库</h2>
        <hr class="my-4" style="border-color: #ffffff; width: 40%; margin: 0 auto;">
        <p class="lead">提供关于癌症的详细介绍、治疗方法、预防措施等，帮助公众了解癌症。</p>
        <p class="card-text">如需了解详情，请点击导航栏中的“癌症知识库”！</p>
        <video class="knowledge" src="{{ asset("videos/cancer.mp4") }}" alt="cancer" controls>
    </div>
</div>
@endsection
