@extends('layouts.admin')

@section('title', '用户管理')

@section('content')
    <div class="container">
        <h1>用户管理</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>姓名</th>
                    <th>电子邮件</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.editUser', $user->id) }}" class="btn btn-warning">编辑</a>
                            <a href="{{ route('admin.deleteUser', $user->id) }}" class="btn btn-danger">删除</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection