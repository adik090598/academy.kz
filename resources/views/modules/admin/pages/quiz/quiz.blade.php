@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2"></h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('quiz.index')}}">Тесты</a></li>
            <li class="breadcrumb-item active" aria-current="page">Вопрос</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="h-100">
                <header class="m-5">
                    <h2 class="h3 card-header-title"></h2>
                    <a href="#" class="btn btn-outline-primary mt-3" data-toggle="modal" data-target="#addQuestion">
                        Добавить вопрос
                        <i class="ti ti-plus"></i>
                    </a>
                </header>

                <div class="card-body pt-0">
                    @if($questions)
                        @foreach($questions->questions as $key => $question)
                        <div class="question-box">
                            <h3 class="question-text">{{($key+1)."-".$question->question_text}}</h3>
                            @foreach($question->answers as $key => $answer)
                                <h5>{{($key+1).")".$answer->answer}}</h5>
                            @endforeach
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="addQuestion" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Добавить вопрос</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('question.store')}}" method="post">
{{--                        <div class="form-group">--}}
{{--                            <textarea class="ckeditor form-control" id="question-ckeditor" name="question"></textarea>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <x-admin.input-form-group-list
                                :errors="$errors"
                                :elements="$question_web_form"/>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft btn-sm" data-dismiss="modal">
                        <i class="ti ti-close"></i> Закрыть</button>
                    <button type="submit" class="offset-md-4 col-md-4 btn btn-block btn-primary text-uppercase">
                        Сохранить <i class="ti ti-check"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#question-ckeditor').ckeditor();
        });
    </script>
@endsection
