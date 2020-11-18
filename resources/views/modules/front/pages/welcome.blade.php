@extends('modules.front.layouts.app-full')
@section('content')
    <section class="academy-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-xl-9 text-xl-center">
                    <h2 class="text-center text-xl-center col-12 col-lg-7 col-xl-12 text-lg-left">AcademyKZ</h2>
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
                    <p class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1"> - Біздің портал арқылы түрлі байқау, жарыстар мен олимпиадаларға
                        қатысып ТӨСБЕЛГІ,
                        СЕРТИФИКАТ,
                        ДИПЛОМ,
                        АЛҒЫС ХАТТАРҒА ие болуға мүмкіндік бар.</p>
                </div>
            </div>
            <div class="row">
                <div class="certificates offset-xl-5 offset-6">
                    <img class="certificate-img d-none d-xl-inline" src="{{asset('modules/front/assets/img/welcome/certificate.png')}}"
                         alt="">
                    <img class="certificate-img" src="{{asset('modules/front/assets/img/welcome/certificate2.png')}}"
                         alt="">
                    <img class="certificate-img" src="{{asset('modules/front/assets/img/welcome/certificate3.png')}}"
                         alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
