@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2"></h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('quiz.index')}}">Тесты</a></li>
            <li class="breadcrumb-item active" aria-current="page">Вопрос</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">

                <header class="card-header">
                    <h2 class="h3 card-header-title"></h2>
                    <a href="{{route('quiz.create')}}" class="btn btn-outline-primary mt-3">
                        Добавить вопрос
                        <i class="ti ti-plus"></i>
                    </a>
                </header>

                <div class="card-body pt-0">
                    @if($questions)
                        @foreach($questions as $question)
                        <div class="question-box">
                            <h3 class="question-text">{{$question->question_text}}</h3>
                            @foreach($question->answers as $answer)
                                <h4>{{$answer->question_id}} {{$answer->answer}}</h4>
                            @endforeach
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
