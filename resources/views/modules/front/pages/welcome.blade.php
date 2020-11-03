@extends('modules.front.layouts.app-partial')
@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/welcome.css')}}">
    @endsection

@section('content')
<header class="mb-5">
    <div class="container">
    <div class="row">
        <div class="col-xl-7 col-sm-7 col-md-7 col-lg-7 py-11">
            <div class="text-center py-11">
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
    </section>


@endsection
