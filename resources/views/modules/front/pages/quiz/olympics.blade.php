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
                    {{--                    <h5>Фильтр</h5>--}}
                    {{--                    <select class="form-control">--}}
                    {{--                        @foreach($subjects as $subject)--}}
                    {{--                            <option value="{{$subject->id}}">{{$subject->name}}</option>--}}
                    {{--                        @endforeach--}}
                    {{--                    </select>--}}
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
                                        <p class="quiz-detail mt-lg-4"><i
                                                class="fa fa-check"></i> {{$quiz->questions_count}}
                                            сұрақ</p>
                                        <p class="quiz-detail"><i class="fa fa-clock"></i> {{$quiz->duration}}
                                            минут
                                        </p>
                                        <div class="d-block d-lg-flex">
                                            <p class="quiz-detail"><i
                                                    class="fa fa-calendar"></i> {{$quiz->subject->name}}</p>
                                            <a href="{{route('quiz.single' ,['id'=> $quiz->id])}}"
                                               class="btn btn-primary ml-auto float-right">Тапсырыс беру</a>
                                        </div>
                                        <a href="{{route('quiz.single' ,['id'=> $quiz->id])}}"
                                           class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if($quizzes->isEmpty())
            <h4 class="text-center">Олимпиадалар табылған жоқ!</h4>
        @endif
    </div>
@endsection
