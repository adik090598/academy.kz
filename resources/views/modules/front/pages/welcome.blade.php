@extends('modules.front.layouts.app-full')
@section('content')
    <section class="Akadem-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-xl-9 text-xl-center">
                    <h2 class="text-center text-xl-center col-12 col-lg-7 col-xl-12 text-lg-left">AkademKZ</h2>
                    <h3 class="col-9 col-xl-12 col-lg-6">Білім әлеміне қош келдіңіздер!</h3>
                    <p class="col-7 col-xl-6 offset-xl-3 col-lg-5">Сіз мұнда ашық сабақтар, сабақ жоспарлары, тәрбие
                        сағаттарды,
                        және басқа да мұғалімдерге керекті құжаттарды таба аласыз.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="pupils-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-xl-8 offset-xl-4 col-lg-7 offset-lg-5 text-center">
                    <h2>Оқушылар</h2>
                    <p class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1"> - Біздің портал арқылы түрлі байқау, жарыстар
                        мен олимпиадаларға
                        қатысып ТӨСБЕЛГІ,
                        СЕРТИФИКАТ,
                        ДИПЛОМ,
                        АЛҒЫС ХАТТАРҒА ие болуға мүмкіндік бар.</p>
                </div>
            </div>
            <div class="row">
                <div class="certificates offset-xl-5 offset-6">
                    <img class="certificate-img d-none d-xl-inline"
                         src="{{asset('modules/front/assets/img/welcome/certificate2.jpg')}}"
                         alt="">
                    <img class="certificate-img" src="{{asset('modules/front/assets/img/welcome/certificate.jpg')}}"
                         alt="">
                    <img class="certificate-img" src="{{asset('modules/front/assets/img/welcome/certificate3.jpg')}}"
                         alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="teachers-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-11 col-md-7 col-lg-6">
                    <h2 class="col-12 offset-lg-2">Педагогтар</h2>
                    <p class="col-12 offset-lg-2 mt-3"> - Біздің портал арқылы түрлі бағытта тәжірибе алмасып,
                        байқаулар мен жарыстар, олимпиадаларға қатыса отырып, білімдерін шыңдап,
                        жеңімпаз атануға зор мүмкіндіктер бар. Әр педагог жеткен жетістігіне сәйкес түрлі мақтау
                        қағаздары мен төсбелгімен марапатталады.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="tests-section">
        <div class="container-fluid quizzes">
            <div class="row">
                <h2 class="col-12 col-xl-6 offset-xl-1 text-center">Тесттар</h2>
                <div class="quizzes-card col-lg-12 col-xl-9 col-12">
                    @foreach($quizzes as $quiz)
                        <div class="card col-lg-10 col-xl-9 col-12 offset-lg-1 offset-xl-2 p-0 mt-4">
                            <div class="card-body p-0">
                                <div class="d-flex">
                                    <div class="col-5 col-lg-4 p-0">
                                        <img src="{{asset($quiz->image_path)}}" alt="" class="quiz-img">
                                    </div>
                                    <div class="col-7 col-lg-8 p-1 pr-3 d-block mt-1">
                                        <p class="quiz-detail quiz-detail-title">{{$quiz->name}}</p>
                                        <p class="quiz-detail mt-lg-4"><i
                                                class="fa fa-check"></i> {{$quiz->questions_count}}
                                            сұрақ</p>
                                        <p class="quiz-detail"><i class="fa fa-clock"></i> {{$quiz->duration}}
                                            минут
                                        </p>
                                        <div class="d-block d-lg-flex">
                                            <p class="quiz-detail"><i
                                                    class="fa fa-calendar"></i> {{$quiz->subject->name}}</p>
                                            <a href="" class="btn btn-primary ml-auto float-right">Тапсырыс беру</a>
                                        </div>
                                        <a href="{{route('front.quiz.index')}}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
