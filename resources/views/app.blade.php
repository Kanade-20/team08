<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title')</title>
    @stack('styles')
</head>
<style>
        /* 背景設定 */
        body.pre_sdg {
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
            color: black;
            font-family: 'Arial', sans-serif; /* 設定字型 */
        }

        /* Header 設定 */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;  /* 確保 header 在最上層 */
            background: rgba(0, 0, 0, 0.7);  /* 透明黑色背景，讓內容更清晰 */
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .header nav ul li {
            margin: 0 15px;
        }

        .header nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.2em;
            font-weight: bold;
            transition: color 0.3s;
        }

        .header nav ul li a:hover {
            color: rgb(220, 120, 0); /* 滑鼠懸停時的顏色 */
        }

        /* 讓 home 區域的文字隨著滾動進行移動 */
        .homecss {
            position: relative;
            width: 100%;
            height: 500px;
            background: rgba(222, 220, 220, 0.504);
            background: url(https://www.shutterstock.com/image-vector/sdg-goal-3-good-health-260nw-2552475201.jpg)
                        no-repeat 50% 50% fixed;
            background-size: cover;  /* 用cover讓圖片覆蓋整個區域 */
            overflow: hidden;
        }


        .homecss h1 {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            padding: .3em;
            font-size: 4em;
            font-weight: lighter;
            color: rgb(145, 51, 234);
            text-align: center;
            font-weight: bold;
        }

        .intro {
            padding: 2em 10%;
            text-align: center;
            background-color: #f5f5f5;
            color: #333;
        }

        .intro h2 {
            font-size: 2em;
            margin-bottom: 1em;
        }

        .intro p {
            font-size: 1.2em;
            line-height: 1.6;
        }

        /* Content Wrapper */
        .content-wrapper {
            padding: 1em 10%;
            margin-top: 150px; /* 確保不被 header 覆蓋 */
        }

        .content-wrapper h1 {
            margin: 0;
            color: rgb(220, 120, 0);
        }

        .content-wrapper p {
            font-family: "Open Sans", sans-serif;
            text-indent: 1.5em;
            line-height: 1.6;
        }

        /* 當使用者滾動頁面時，變更 navbar 背景的透明度 */
        .nav-bg {
            content: '';
            position: absolute;
            display: block;
            top: -100%;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: rgb(50, 50, 50);
            transition: .45s ease-in-out;
        }

        .bg-hidden {
            top: -100%;
            opacity: 0;
        }

        .bg-visible {
            top: 0;
            opacity: 1;
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
            padding-top: 50px;
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
            margin-left: 10px ;
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
    <div class="header">
        @include('header')
    </div>
    <div class="create_h ">
        @yield('create_theme')
    </div>    
    <div>
        @yield('sdghome')
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
    @stack('scripts')
</body>   
</html>