<!-- Sidebar -->
<nav id="sidebar" >
    <div id="dismiss"><span>X</span>
    </div>
    @if (Route::has('login'))
        @auth
            <div class="sidebar-header">
                <h3>{{Auth::user()->name}}</h3>
                <p>баланс:0тг</p>
            </div>
        @else
            <li class="nav-item">
                <a style="color: #fff;" href="{{ route('login') }}">Кіру</a> /
                @if (Route::has('register'))
                    <a style="color: #fff;" href="{{ route('register') }}">Тіркелу</a>
                @endif
            </li>
        @endauth
    @endif
    <ul class="sidebar-nav list-unstyled">
        <li class="active">
            <a href=""  aria-expanded="false">Домой</a>
        </li>
        <li>
            <a class="" href="#">Олимпиада</a>
        </li>
        <li>
            <a class="" href="#">Журнал</a>
        </li>
        <li>
            <a class="" href="{{route('quiz.index')}}">Тестар</a>
        </li>
    </ul>
</nav>

<!-- Page Content -->
    <nav class="mobile-nav">
            <button type="button" id="sidebarCollapse" class="menu-btn">
                <span></span>
            </button>
            <a href="/welcome" class="logo">academi.kz</a>
            <div class="profile"></div>
    </nav>
<!-- Dark Overlay element -->
<div class="overlay"></div>
