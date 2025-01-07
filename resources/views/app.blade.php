<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title')</title>

</head>
<style>
        body.pre_sdg{
            background-image: linear-gradient(rgba(0,0,0, 0.4), rgba(0, 0, 0, 0.4)),
            url('https://thumb.ac-illust.com/30/30d142864bc98bbf6a2ea8b352834fd4_t.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0; 
            display: flex;
            flex-direction: column; 
            justify-content: space-between; 
        }

        .header{
            background: khaki;
            padding: 30px;
            border-radius: 15px;
            font-size: 2em;
            font-weight: bold;
            text-align: center;
        }

        .bordered-table {          
            border-collapse: collapse; 
            align-items: center; 
            width: auto; 
            
        }

        table.bordered{
            background-color: rgba(173, 216, 230, 0.568);
            border-radius: 10px;
            margin: 0 auto; 
            padding-left: 100px;
            padding: 10px;
            text-align: center;
        }

        .bordered-table th,
        .bordered-table td {
            border: 1px solid black; 
            padding: 10px 20px; 
            vertical-align: middle; 
            font-size: 16px; 
            text-align: center;
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
            text-align: center;
        }

        ul.my_sdg3{
            padding: 0;
            border-radius: 10px; 
            margin: 5px 10%;
            padding: 15px; 
            background-color: rgba(241, 241, 241,0.5);  
            text-align: center;
        }
        
        li.issue_title{
            border-radius: 10px;
            font-size: 150%;
            font-weight: bold;
            text-align: center;
        }
        
        img.sdgs{
            display: block;
            margin-left: 23px ;
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

        img.sdg3{
            border-radius: 15px;
            height: 268px;
            width: 400px;
        }

        .button {
            background-color: #04AA6D; /* Green */
            border: none;
            color: white;
            padding: 6px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 10px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 10px; 
        }

        .button2 {
            background-color: white; 
            color: black; 
            border: 2px solid #008CBA;
        }

        .button2:hover {
            background-color: #008CBA;
            color: white;
        }

        .text{
            text-align: center;
        }

        @media (min-width: 640px) {
            .sm\:text-center {
                text-align:center
            }
        }

        form.custom-form {
            background-color: rgba(173, 216, 230, 0.568); 
            border-radius: 10px;  
            margin: 0 auto;  
            padding-left: 100px;  
            padding: 10px;  
            width: 313px;  
        }

        .form-control{
            width: 200px;
            padding: 5px
        }

        .center-form {
            display: flex;
            justify-content: center;
        }



</style> 
<body class="pre_sdg">
    <div class="bold header">
        @include('header')
    </div>
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" >Home</a>
            @else
                <a href="{{ route('login') }}" >Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" >Register</a>
                @endif
            @endif
        </div>
    @endif
    <div class="create_h ">
        @yield('create_theme')
    </div>    
    <div class="bordered-table bordered custom-form">
        @yield('create_contents')
    </div>
    <div class="my_sdg3 issue_title issue_content text_color text_comtent sdg3">
        @yield('sdgs_contents')
    </div>    
    <div class="sdgs sdg-grid">
        @yield('sdgs_img')
    </div>    
    <div>
        @include('footer')
    </div>
</body>   
</html>