@extends('modules.front.layouts.app-full')

@section('content')
    <div class="container pt-5" style="min-height: 766px;">
        <div class="accordion" id="accordionExample">

                    <h5 class="mb-0">
                       Вы набрали  {{$result}}/{{$count}}
                    </h5>
                    <h4> Ваш результат {{$resString}}</h4>
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Посмотреть мои ответы
                        </button>
                    </h2>

                <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        @if($userAnswers)
                            <ul>
                                @foreach($userAnswers as $question)
                                    @if($question->answers->get(1)->is_right)
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">{!! $question->question_text  !!} </h4>
                                            <p>{{ $question->answers->first()->answer  }}</p>
                                        </div>
                                    @else
                                        <div class="alert alert-danger" role="alert">
                                            <h4 class="alert-heading">{!! $question->question_text  !!}</h4>
                                            <p class="mb-0"></p>
                                        </div>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
        </div>

    </div>
@endsection

@section('scripts')
@endsection