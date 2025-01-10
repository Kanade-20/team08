@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header bg-warning text-white">
            <h2>编辑用户信息</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">用户名:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">电子邮箱:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">角色:</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>管理员</option>
                        <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>经理</option>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>普通用户</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">更新</button>
            </form>
        </div>
    </div>
@endsection