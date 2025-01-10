<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style> 
    .navbar {
        background-color: #4CAF50 !important;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        text-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .navbar-brand {
        font-size: 45px;
        font-weight: bold;
    }

    .nav-link {
        font-size: 28px;
        margin-right: 20px;
        transition: background-color 0.3s ease;
    }

    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
    }
    
    .users {
        margin-right: 25px;
    }

    .users img {
        max-width: 50px;
        height: 40px;
    }

    .users a {
        padding-bottom: 38px;
        font-size: 18px;
        margin-right: 5px;
    }
    
    .login {
        padding-right: 20px;
    }

    .welcome {
        margin-bottom: 20px;
        font-size: 20px;
        margin-right: 20px;
    }
    
    .setting {
        padding-top: 5px;
        font-size: 18px;
    }

    .logout_form {
        padding-bottom: 22px;
        padding-left: 25px;
    }

    .logout .btn {
        font-size: 18px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">癌症信息平台</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/home">首页</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/CancerStatistics">癌症数据</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/health-advice">健康管理建议</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/CancerKnowledge">癌症知识库</a>
                </li>
            </ul>
        </div>
        <div class="users d-flex align-items-center">
             <!-- 登录和注册链接，仅当用户未登录时显示 -->
            @guest
                <a class="login text-white d-flex align-items-center text-decoration-none" href="{{ route('login') }}">
                    <img class="me-1" src="/images/icons/login.png" alt="login">登录
                </a>
                <a class="text-white d-flex align-items-center text-decoration-none" href="{{ route('register') }}">
                    <img class="me-1" src="/images/icons/register.png" alt="register">注册
                </a>
            @else
                <!-- 如果用户已登录，显示用户信息和退出按钮 -->
                <li class="welcome text-white list-unstyled">欢迎，{{ Auth::user()->name }}！</li>
                <li class="setting list-unstyled">
                    <a class="text-white d-flex align-items-center text-decoration-none" href="{{ route('userInfo.show', ['id' => $user->id]) }}">
                        <img class="me-1" src="/images/icons/setting.png" alt="setting">用户信息
                    </a>
                </li>
                <li class="logout_form list-unstyled">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <div class="logout d-flex">
                            <img class="me-1" src="/images/icons/logout.png" alt="logout"/>
                            <button class="text-white align-items-center btn btn-link text-decoration-none">登出</button>
                        </div>
                    </form>
                </li>
            @endguest
        </div>    
    </div>
</nav>