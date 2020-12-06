@extends('modules.front.layouts.app-full')
@section('content')
    <div class="container pt-3" style="min-height: 80vh;">
        <div class="row">
            <div class="d-flex col-12">
                <div class="col-6 text-left">
                    <a href="{{route('front.quiz.index')}}" class="back-button"><i class="fa fa-arrow-circle-left"></i>
                        Тесттар</a>
                </div>
            </div>
            <div class="checkout-container mt-3 col-12">
                <div class="d-flex align-items-center">
                    <img class="checkout-quiz-img" src="{{asset($quiz->image_path)}}" alt="{{$quiz->name}}">
                    <h3 class="quiz-name">{{$quiz->name}}</h3>
                </div>
                <div class="checkout-box d-flex ">
                    <div class="row">
                        <div class="quiz-description col-md-7 col-lg-7 col-xl-7">
                            <p>{{$quiz->description}}</p>

                                @foreach($quiz->documents as $document)
                                    <a href="{{$document->path}}" ><i class="fas fa-file"></i> Ережелерді жүктеп алу</a>
                                    <br>
                                @endforeach

                        </div>
                        <div class="col-md-5">
                            <div class="alert alert-warning">
                                Тапсырыс берілгеннен кейін, тапсырып қабылданғанға дейін күтуіңіз қажет
                            </div>
                            <div class="quiz-details text-center">
                                <div class="row">
                                    <div class="col-12"><label><i class="ti-timer"></i> {{$quiz->duration}} минут уақыт
                                            беріледі</label></div>
                                    <div class="col-12"><h5>Бағасы: {{$quiz->price}}тг.</h5></div>
                                    <div class="col-12 mt-1">
                                        <form action="{{route('quiz.pass', ['id' => $quiz->id])}}" method="post">
                                            @csrf
                                            <button type="submit" class="checkout-btn">Тапсырыс беру</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
