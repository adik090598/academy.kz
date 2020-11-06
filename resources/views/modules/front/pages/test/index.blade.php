@extends('modules.front.layouts.app-full')

@section('content')
    @foreach($quizzes as $quiz)
        <div class="quiz-box">
            <img src="{{ $quiz->image_path }}" alt="{{$quiz->name}}">
            <div class="content">
                <h4 class="text_header">{{$quiz->name}}</h4>
            </div>
            <div class="description">1</div>
        </div>
    @endforeach
@endsection
