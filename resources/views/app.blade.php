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
            background-color: lightblue;
            border-collapse: collapse; 
            display: flex;
            justify-content: flex-start;
            align-items: center; 
            width: auto; 
            border-radius: 10px;
            padding-left: 100px;
        }

        .bordered-table th,
        .bordered-table td {
            border: 1px solid black; 
            padding: 8px; 
        }

        .bordered-table th {
            background-color: #e4522e9b; 
        }

        .bordered-table td{
            background-color: rgba(193, 137, 223, 0.564)
        } 
        .create_h {
            color: rgb(0, 0, 0);
            font-size:150%;
            font-weight: bold;
        }

        ul.my_sdg3{
            padding: 0;
            border-radius: 10px; 
            margin: 5px 10%;
            padding: 15px; 
            background-color: rgba(241, 241, 241,0.5);  
        }
        
        li.issue_title{
            border-radius: 10px;
            font-size: 150%;
            font-weight: bold;
        }
        
        img.sdgs{
            display: block;
            margin-left:23px ;
            height:134px;
            width:200px;
            border-radius: 15px;
        }
        
        ul.issue_content::before {
            content: '• '; 
            color: black; 
            font-size: 1.2em;
        }
        
        p.text_color{
            color:rgb(2, 121, 248); 
            font-weight: bold;
        }

        p.text_comtent{
            text-align: left;    
        }

        .sdg-grid {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            gap: 10px; 
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
    <div class="my_sdg3 issue_title img.sdgs issue_content text_color text_comtent sdg-grid">
        @yield('sdgs_contents')
    </div>    
    <div>
        @include('footer')
    </div>
</body>   
</html>