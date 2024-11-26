<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel: @yield('title')</title>
</head>
<body>
<div>
    <div>
        <div>
            @include('header')
        </div>
        <div>
            @yield('CancerStatistics_index')
        </div>
        <div>
            @include('footer')
        </div>
    </div>
</div>
</body>
</html>