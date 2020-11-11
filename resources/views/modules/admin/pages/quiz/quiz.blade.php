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
                            <h3 class="question-text">{!! ($key+1)."-".$question->question_text !!}</h3>
                            @foreach($question->answers as $key => $answer)
                                <h5>{{($key+1).")".$answer->answer}}
                                    {!! $answer->is_right ? '<i class=ti-check></i>' : '' !!}
                                </h5>
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
                    <form action="{{route('question.store', ['quiz_id' => $questions->id ])}}" method="post">
{{--                        <div class="form-group">--}}
{{--                            <textarea class="ckeditor form-control" id="question-ckeditor" name="question"></textarea>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <x-admin.input-form-group-list
                                :errors="$errors"
                                :elements="$question_web_form"/>
                        </div>
                        <div class="answer_box col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="hidden" name="answers[0][check]" value="0">
                                        <input type="checkbox" name="answers[0][check]" value="1" aria-label="Checkbox for following text input">
                                    </div>
                                </div>
                                <input type="text" name="answers[0][text]" class="form-control" aria-label="answer text">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <button class="btn btn-primary add_field_button" type="button">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="offset-md-4 col-md-4 btn btn-block btn-primary text-uppercase">
                            Сохранить <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft btn-sm" data-dismiss="modal">
                        <i class="ti ti-close"></i> Закрыть</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        var max_fields  = 10; //maximum input boxes allowed
        var wrapper = $('.answer_box'); //Fields wrapper
        var add_button = $('.add_field_button'); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                 //text box increment
                $(wrapper).append(`<div class="input-group mb-3 removeMe">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="hidden" name="answers[${x}][check]" value="0">
                                        <input type="checkbox" name="answers[${x}][check]" value="1" aria-label="Checkbox for following text input">
                                    </div>
                                    </div>
                                    <input type="text" name="answers[${x}][text]" class="form-control" aria-label="answer text">
                                    <div class="input-group-append">
                                    <div class="input-group-text">
                                    <button class="btn btn-danger remove-date" type="button">-</button>
                                    </div>
                                    </div>
                                    </div>`); //add input box
                x++;
            }
        });
        $(wrapper).on("click",".remove-date", function(e){ //user click on remove text
            e.preventDefault(); $(this).closest('div.removeMe').remove(); x--;
        })

        CKEDITOR.replace( 'description' );
    </script>
@endsection
