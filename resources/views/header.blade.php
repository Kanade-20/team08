<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->

<style> 
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100px;
        color: white;
        background-color: #4CAF50 !important;
        z-index: 999;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        text-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .navbar-brand {
        margin-left: 15px;
        font-size: 50px;
        font-weight: bold;
    }

    #navbarNav {
        justify-content: center;
        margin-top: 10px;
    }

   .nav-link {
        font-size: 30px;
        padding: 15px 20px;
        margin: 50px;
    }

    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .users {
        display: flex;
        list-style: none;
        font-size: 22px;
        margin-right: 30px;
        margin-bottom: 50px; 
    }

    .users img {
        height: 45px;
        width: 100%;
        max-width: 30px;
        margin-top: 8px;
    }

    .users li {
        margin-top: 18px;
    }

    .users a {
        padding-left: 0; 
        padding-right: 0;
    }

    .login,.register {
        display: flex;
        margin-left: 30px;
        margin-top: 8px;
    }



    /* 响应式布局 */
    @media (max-width: 767px) {
        .navbar-brand {
            font-size: 28px;
        }

        .navbar-nav {
            text-align: center;
        }

        .navbar-nav .nav-item {
            margin: 5px 0;
        }
    }
</style>

<!-- 导航栏 -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">癌症信息平台</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="/">首页</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/CancerStatistics">癌症数据</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/health-advice">健康管理建议</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cancer-knowledge">癌症知识库</a>
                </li>
            </ul>
            <div class="users">
                @auth
                <!-- 用户已登录，显示登出按钮 -->
                <li class="logout">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-link">登出</button>
                    </form>
                </li>
                @else
                <!-- 用户未登录，显示登录、注册按钮 -->
                <div class="login">
                    <img src="/images/login.png" alt="login">
                    <li>
                        <a href="{{ route('login') }}">登录</a>
                    </li>
                </div>
                <div class="register">
                    <img src="/images/register.png" alt="register">
                    <li>
                        <a href="{{ route('register') }}">注册</a>
                    </li>
                </div>
                @endauth
            </div>    
        </div>
    </div>
</nav>

<!-- 引入JavaScript（例如Bootstrap的JavaScript功能）-->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->