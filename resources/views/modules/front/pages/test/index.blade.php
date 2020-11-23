@extends('modules.front.layouts.app-full')

@section('content')
    @foreach($quizzes as $quiz)
        <div class="quiz-box">
            <img src="{{ $quiz->image_path }}" class="p-1 ml-2" style="height: 100%; width: 200px" alt="{{$quiz->name}}">
            <div class="content">
                <h4 class="text_header">{{$quiz->name}}</h4>
            </div>
            <div class="description">1</div>
            <a href="{{route('attempt', ['id'=>$quiz->id])}}" target="_blank">Сдать тест</a>
        </div>
    @endforeach
@endsection
