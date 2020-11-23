@extends('modules.front.layouts.app-full')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="d-flex col-12">
                <div class="col-6 text-left">
                    <a href="#" class="back-button"><i class="fa fa-arrow-circle-left"></i> Тесттар</a>
                </div>
                <div class="form-group col-6">
                    <select class="form-control">
                        @foreach($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-flex mt-4">
                <div class="col-4 d-none d-lg-block">
                    <div class="card">
                        <div class="card-body">
                            Профиль либо что то еще
                        </div>
                    </div>
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
                                            <a href="{{route('sendQuizRequest' ,['quiz'=>$quiz->id])}}" class="btn btn-primary ml-auto float-right">Тапсырыс беру</a>
                                        </div>
                                        <a href="{{route('quiz' ,['quiz'=>$quiz->id])}}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
