<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title')</title>

</head>
<style>
        body.pre_sdg{
            text-align: center;
            background-image: linear-gradient(rgba(0,0,0, 0.4), rgba(0, 0, 0, 0.4)),
            url('https://thumb.ac-illust.com/30/30d142864bc98bbf6a2ea8b352834fd4_t.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .header{
            background: khaki;
            padding: 30px;
            border-radius: 15px;
            font-size: 2em;
            font-weight: bold;
        }

        .bordered-table {
            border-collapse: collapse; 
            width: 100%;
        }

        .bordered-table th,
        .bordered-table td {
            border: 1px solid black; 
            padding: 8px; 
        }

        .bordered-table th {
            background-color: #6bd3e39b; 
        }

        .bordered-table td{
            background-color: rgba(193, 137, 223, 0.564)
        } 
        .create_h {
            color: rgb(0, 0, 0);
            font-size:150%;

        }
</style> 
<body class="pre_sdg">
    <div class="bold header">
        @include('header')
    </div>
    <div class="create_h ">
        @yield('create_theme')
    </div>    
    <div class="bordered-table">
        @yield('create_contents')
    </div>
    <div>
        @include('footer')
    </div>
</body>   
</html>