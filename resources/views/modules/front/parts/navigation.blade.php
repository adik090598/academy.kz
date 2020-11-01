<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand absolute" href="{{url('/welcome')}}">academy.kz</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">олимпиада</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">журнал</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">курстар</a>
                </li>
            </ul>
            <ul class="navbar-nav absolute-right">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a style="color: #fff;" href="{{ route('login') }}">Кіру</a> /
                            @if (Route::has('register'))
                                <a style="color: #fff;" href="{{ route('register') }}">Тіркелу</a>
                            @endif
                        </li>
                    @endauth
                @endif
            </ul>

        </div>
    </div>
</nav>
