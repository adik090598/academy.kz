@extends('modules.front.layouts.app-partial')
@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/welcome.css')}}">
    @endsection

@section('content')
<header class="mb-5">
    <div class="container">
    <div class="row">
        <div class="col-xl-7 col-sm-7 col-md-7 col-lg-7">
            <div class="text-center text-academy">
                <p class="academykz"> AcademyKZ </p>
                <p class="h1 mb-5 header-text1">Білім әлеміне қош келдіңіздер!</p>
                <p>
                    Сіз мүнда ашық сабактар, сабақ жоспары, тәрбие сағаттарды,<br>
                    және басқа да мұғалімдерге керекті құжаттарды таба аласыз.
                </p>
            </div>
        </div>
        <div class="col-xl-5 col-sm-5 col-md-5 col-lg-5">
                <img class="teacher-img" src="{{asset('modules/front/assets/img/header/teacher.png')}}" alt="Teacher">
        </div>
    </div>
    </div>
    <img class="img-responsive dids-img" src="{{asset('modules/front/assets/img/header/dids.png')}}" alt="Dids">
</header>

    <section class="students">
         <div class="students-text">
            <h1>оқушылар</h1>
             <p>Біздің портал арқылы түрлі байқау, жарыстар мен <br>
                 олимпиадаларға қатысып ТӨСБЕЛГІ, СЕРТИФИКАТ, <br>
                 ДИПЛОМ, АЛҒЫС ХАТТАРҒА ие болуға мүмкіндік бар.</p>
         </div>
        <img class="img-responsive student-img" src="{{asset('modules/front/assets/img/header/student.png')}}" alt="Student">
        <img class="img-responsive trophy-img" src="{{asset('modules/front/assets/img/header/trophy.png')}}" alt="Trophy">
        <div class="text-center images-bottom">
            <img class="img-responsive image-1" src="{{asset('modules/front/assets/img/header/image1.png')}}" alt="Img1">
            <img class="img-responsive image-2" src="{{asset('modules/front/assets/img/header/image2.png')}}" alt="Img2">
            <img class="img-responsive image-3" src="{{asset('modules/front/assets/img/header/image3.png')}}" alt="Img3">
        </div>
    </section>

    <section class="teachers">
        <h1 class="teachers-p">Педагогтар</h1>
                    <p>- Біздің портал арқылы түрлі бағытта тәжірибе <br>
                        алмасып, байқаулар мен жарыстар, <br>
                        олимпиадаларға қатыса отырып, білімдерін <br>
                        шыңдап, жеңімпаз атануға зор мүмкіндіктер бар. <br>
                        Әр педагог жеткен жетістігіне сәйкес түрлі мақтау <br>
                        қағаздары мен төсбелгімен марапатталады.</p>
        <img class="teachers-image" src="{{asset('modules/front/assets/img/header/teachers-image.png')}}" alt="Teachers Image">
    </section>
    <section class="tests">

    </section>


@endsection
