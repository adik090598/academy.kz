@extends('modules.front.layouts.app-full')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="d-flex col-12">
                <div class="col-6 text-left">
                    <a href="{{route('welcome')}}" class="back-button"><i class="fa fa-arrow-circle-left"></i> Негізгі
                        бет</a>
                </div>
                <div class="form-group col-6">
                    {{--                    <input type="text" class="form-control" placeholder="Поиск">--}}
                </div>
            </div>
            <div class="d-flex mt-4">
                <div class="col-4 d-none d-lg-block">
                </div>
                <div class="col-xl-8 col-12 quizzes">
                    @foreach($quizzes as $quiz)
                        <div class="card col-12 p-0 mb-4">
                            <div class="card-body p-0">
                                <div class="d-flex">
                                    <div class="col-5 col-lg-4 p-0">
                                        <img src="{{asset($quiz->image_path)}}" alt="" class="quiz-img">
                                    </div>
                                    <div class="col-7 col-lg-8 p-1 pr-3 d-block mt-1">
                                        <p class="quiz-detail quiz-detail-title">{{$quiz->name}}</p>
                                        <p class="quiz-detail mt-lg-4"> {{$quiz->description}}</p>
                                        <p class="quiz-detail mt-lg-4">
                                            @foreach($quiz->documents as $document)
                                                <a href="{{$document->path}}">Документ</a>
                                                <br>
                                                <br>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if($quizzes->isEmpty())
            <h4 class="text-center">Байқаулар табылған жоқ!</h4>
        @endif
    </div>
@endsection
