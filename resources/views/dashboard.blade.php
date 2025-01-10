@extends('layouts.app')

@section('content')
    @if (Auth::user()->role === 'admin')
        <div class="container mt-5">
            <div class="alert alert-info">
                <h1 class="text-center">欢迎管理员</h1>
                <p>作为平台的管理员，你拥有最高权限，可以管理所有用户、修改系统设置、查看统计数据等。</p>
                <p>你可以在后台管理页面进行以下操作：</p>
                <ul>
                    <li>查看并管理所有用户</li>
                    <li>查看并管理所有数据</li>
                    <li>维护并完善个性化健康建议功能</li>
                </ul>
                <p>请务必小心操作，确保平台的正常运行！</p>
            </div>
        </div>
    @elseif (Auth::user()->role === 'manager')
        <div class="container mt-5">
            <div class="alert alert-warning">
                <h1 class="text-center">欢迎经理</h1>
                <p>作为平台的经理，你拥有业务相关的管理权限。</p>
                <p>你可以在后台管理页面进行以下操作：</p>
                <ul>
                    <li>查看并编辑用户信息</li>
                    <li>编辑癌症数据和知识库</li>
                    <li>查看癌症数据和知识库</li>
                </ul>
                <p>你没有删除用户的权限，但可以查看和编辑用户信息。</p>
            </div>
        </div>
    @elseif (Auth::user()->role === 'user')
        <div class="container mt-5">
            <div class="alert alert-success">
                <h1 class="text-center">欢迎用户</h1>
                <p>作为平台的普通用户，你可以浏览癌症知识库，获取个性化的健康建议，并跟踪你的健康状况。</p>
                <p>你可以在平台上进行以下操作：</p>
                <ul>
                    <li>查询癌症相关信息和健康建议</li>
                    <li>查看你的健康记录和历史查询</li>
                    <li>更新你的健康信息，以便获得更精确的建议</li>
                </ul>
                <p>我们会为你提供最新的健康数据和建议，帮助你保持健康！</p>
            </div>
        </div>
    @else
        <div class="container mt-5">
            <div class="alert alert-danger">
                <h1 class="text-center">无权访问</h1>
                <p>你没有权限访问此页面，请联系管理员获取更多信息。</p>
            </div>
        </div>
    @endif
@endsection
