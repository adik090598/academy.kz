<header>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand ml-lg-5" href="{{route('welcome')}}">academy.kz</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-list"></i>
        </button>
        <div class="collapse navbar-collapse text-right" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Олимпиада <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Тесттар</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Байқаулар</a>
                </li>
                @if(!Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Кіру / Тіркелу</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name. ' ' .Auth::user()->surname}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#"><i class="fa fa-list"></i> Менің тесттарым</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Менің сертификаттарым</a>
                            <form action="{{route('logout')}}" method="post" id="signOutForm">
                                @csrf
                                <a class="dropdown-item" href="#"
                                   onclick="document.getElementById('signOutForm').submit()">
                                    <i class="fa fa-sign-out-alt"></i> Шығу
                                </a>
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
