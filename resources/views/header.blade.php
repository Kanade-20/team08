<nav>
    <div class="nav-bg"></div>
    <ul>
      <li><a href="/">首頁</a></li>
      <li><a href="/sdgs">癌症介紹</a></li>
      <li><a href="{{ url('CancerStatistics') }}">癌症資料庫</a></li>
      @guest
            <li><a href="{{ route('login') }}">Sign In</a></li>
            <li><a href="{{ route('register') }}">Sign Up</a></li>
        @else
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Log Out
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </ul>
  </nav>
  <nav>

  
