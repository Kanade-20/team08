<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix ('css/app.css') }}">
    <title>癌症信息管理平台</title>
</head>
<body>
    <!-- 主体内容 -->
    <div class="container">
        <div>
            @include('header')
        </div>
        <div>
            @yield('home')
        </div>
        <div>
            @yield('CancerStatistics_index')
        </div>
        <div>
            @yield('CancerStatistics_create')
        </div>
        <div>
            @include('footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>