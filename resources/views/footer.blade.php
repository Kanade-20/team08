<style>
    footer {
        margin-top: 10%;
        position: relative;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 200px;
        color:#fff;
        background-color:#333 !important;
        z-index: 999;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        text-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    nav {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    nav ul {
        display: flex;
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .nav-item {
        margin: 0 10px;
    }

    nav img {
        width: 30px;
        height: 30px;
        margin-right: 5px;
    }

    footer .container {
        text-align: center;
        margin-top: 10px;
    }
</style>

<footer class="bg-dark text-white mt-5 py-3">
    <div class="container text-center">
        <p>&copy; 2024 癌症信息管理平台. 版权所有.</p>
        <p>
            <nav>
                <ul>
                    <span>分享:</span>
                     <li class="nav-item">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="text-white mx-2">
                            <img src="/images/icons/fb.png" alt="Facebook icon">Facebook
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}" target="_blank" class="text-white mx-2">
                            <img src="/images/icons/twitter.png" alt="Twitter icon">Twitter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://social-plugins.line.me/lineit/share?url={{ urlencode(url()->current()) }}" target="_blank" class="text-white mx-2">
                            <img src="/images/icons/line.png" alt="Line icon">Line
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}" target="_blank" class="text-white mx-2">
                            <img src="/images/icons/linkedin.png" alt="Linkedin icon">LinkedIn
                        </a>
                    </li>
                </ul>
            </nav>
        </p>
        <p>
            <a href="/privacy-policy" class="text-white">隐私政策</a> |
            <a href="/terms-of-service" class="text-white">服务条款</a>
        </p>  
    </div>
</footer>