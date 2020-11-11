@extends('modules.front.layouts.app-partial')
@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/welcome.css')}}">
@endsection
@section('content')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-sm-7 col-md-7 col-lg-7">
                    <h2 class="academykz text-center">AcademyKZ</h2>
                    <div class="text-left text-academy">
                        <h4 class="header-text1">Білім әлеміне қош келдіңіздер!</h4>
                        <p>
                            Сіз мүнда ашық сабактар, сабақ жоспары, тәрбие сағаттарды,
                            және басқа да мұғалімдерге керекті құжаттарды таба аласыз.
                        </p>
                    </div>
                </div>
                <div class="col-xl-5 col-sm-5 col-md-5 col-lg-5">
                    <img class="img-responsive teacher-img"
                         src="{{asset('modules/front/assets/img/header/teacher.png')}}" alt="Teacher">
                </div>
                <div class="teacher-img-box">
                    <img class="img-responsive teacher-img"
                         src="{{asset('modules/front/assets/img/header/teacher.png')}}" alt="Teacher">
                </div>
            </div>
        </div>
            <div class="float-right">
                <img class="img-responsive dids-img" src="{{asset('modules/front/assets/img/header/dids.png')}}"
                     alt="Dids">
            </div>

    </header>
    <section class="students">
        <div class="students-text">
            <h1>оқушылар</h1>
            <p>Біздің портал арқылы түрлі байқау, жарыстар мен
                олимпиадаларға қатысып ТӨСБЕЛГІ, СЕРТИФИКАТ,
                ДИПЛОМ, АЛҒЫС ХАТТАРҒА ие болуға мүмкіндік бар.
        </div>
        <img class="img-responsive student-img" src="{{asset('modules/front/assets/img/header/student.png')}}"
             alt="Student">
        <img class="float-right trophy-img" src="{{asset('modules/front/assets/img/header/trophy.png')}}" alt="Trophy">

        <div class="text-center images-bottom">
            <img class="img-responsive" src="{{asset('modules/front/assets/img/header/image1.png')}}" alt="Img1">
            <img class="img-responsive" src="{{asset('modules/front/assets/img/header/image2.png')}}" alt="Img2">
            <img class="img-responsive" src="{{asset('modules/front/assets/img/header/image3.png')}}" alt="Img3">
        </div>
    </section>

    <section class="teachers">
        <h1 class="teachers-p">ПЕДАГОГТАР</h1>
        <p>- Біздің портал арқылы түрлі бағытта тәжірибе
            алмасып, байқаулар мен жарыстар,
            олимпиадаларға қатыса отырып, білімдерін
            шыңдап, жеңімпаз атануға зор мүмкіндіктер бар.
            Әр педагог жеткен жетістігіне сәйкес түрлі мақтау
            қағаздары мен төсбелгімен марапатталады.</p>
        <div class="teacher-img-box">
            <img class="teachers-image" src="{{asset('modules/front/assets/img/header/teachers-image.png')}}"
                 alt="Teachers Image">
        </div>
    </section>
    <section class="tests">
        <div class="container" style="margin-top: 150px">
            <div class="row">
                <div class="col-xl-6 col-sm-6 col-md-6 col-lg-6">
                    <h1>Тесттар</h1>
                </div>
                <div class="col-xl-6 col-sm-6 col-md-6 col-lg-6">
                </div>
            </div>
        </div>
        <div class="test-items"
             style="background-image: url({{asset('modules/front/assets/img/header/rectangle-image.png')}})">
            <div class="float-left rectangle-image">
                {{--<img class="img-responsive" src="{{asset('modules/front/assets/img/header/rectangle-image.png')}}" alt="Rectangle Image">--}}
                <div class="row all-tests">
                    <div class="col-md-6 col-lg-6">
                        <img class="img-responsive" src="{{asset('modules/front/assets/img/header/book1.png')}}"
                             alt="book1">
                        <p>Мектеп» республикалық <br>
                            ғылыми-әдістемелік,<br>
                            педагогикалық журнал</p>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <img class="img-responsive" src="{{asset('modules/front/assets/img/header/book2.png')}}"
                             alt="book2">
                        <p>«Жас ғалым» дарында <br>
                            балаларға арналған <br>
                            республикалық <br>
                            ғылыми-танымдық журнал</p>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <img class="img-responsive" src="{{asset('modules/front/assets/img/header/book3.png')}}"
                             alt="book3">
                        <p> «Ардақты ардагер» <br>
                            рухани-мәдени, <br>
                            ақпараттық-танымдық <br>
                            республикалық журналы</p>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <img class="img-responsive" src="{{asset('modules/front/assets/img/header/book4.png')}}"
                             alt="book4">
                        <p>«Қазығұрт.kz» <br>
                            әдеби-көркем, <br>
                            мәдени-әлеуметтік, <br>
                            тарихи-танымдық журнал</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="float-right woman-img">
            <img class="img-responsive" src="{{asset('modules/front/assets/img/header/woman-image.png')}}"
                 alt="Woman Image">
        </div>

        <div class="materials">
            <div class="container" style="margin-top: 100px">
                <div class="row">
                    <div class="col-xl-6 col-sm-6 col-md-6 col-lg-6">
                        <h1>материал жариялау</h1>
                    </div>
                    <div class="col-xl-6 col-sm-6 col-md-6 col-lg-6">

                    </div>
                </div>
                <div class="row" style="margin-top: 50px">
                    <div class="col-md-7 col-lg-7">
                        <div class="text-left">
                            <h3 style="margin-bottom: 40px">Құрметті педагогтар</h3>
                            <p>
                                БІЗДІҢ БАСЫЛЫМДАРҒА педагогтардың патрфолиосы үшін <br>
                                маңызды сабақ жоспарларын, ашық сабақ, мақала, іс-шара, ҚМЖ,<br>
                                ОМЖ, ҰМЖ, тәрбие сағаттары мен мұғалімдер мен оқушылардың ғылыми және шығармашылық
                                жұмыстарын, іс-тәжірибеңізді жариялауға болады.
                                Материалыңызды жариялап СЕРТИФИКАТ, АЛҒЫС ХАТҚА ие бола аласыз. <br>
                                Ақпарат алу үшін: 8 778 943 19 50; <br>
                                8707 804 86 40, <br>
                                эл.пошта: mektep_jurnal@mail.ru

                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="float-right">
                <img class="material-image img-responsive"
                     src="{{asset('modules/front/assets/img/header/material-image.png')}}" alt="Material Image">
            </div>
        </div>
    </section>
@endsection
