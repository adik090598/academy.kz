@extends('modules.front.layouts.app-partial')
@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/welcome.css')}}">
    @endsection

@section('content')
<header>
    <div class="row">
        <div class="col-7">
            <div class="row justify-content-center">
                <p class="academykz"> AcademyKZ </p>
            </div>
            <p class="h1">Білім әлеміне қош келдіңіздер!</p>
            <p>
                Сіз мүнда ашық сабактар, сабақ жоспары, тәрбие сағаттарды,<br>
                және басқа да мұғалімдерге керекті құжаттарды таба аласыз.
            </p>

        </div>
        <div class="col-5">

        </div>
    </div>
</header>
@endsection
