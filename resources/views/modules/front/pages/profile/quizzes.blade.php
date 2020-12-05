@extends('modules.front.layouts.app-full')

@section('content')
    <div class="container pt-5" style="min-height: 766px;">

        <div class="card-body">
            @foreach($results as $result)
                <div class="card col-12 p-0 mb-4">
                    <div class="card-body p-0">
                        <div class="d-flex">
                            <div class="col-5 col-lg-4 p-0">
                                <img src="{{asset($result->quiz->image_path)}}" alt="" class="quiz-img">
                            </div>
                            <div class="col-7 col-lg-8 p-1 pr-3 d-block mt-1">
                                <p class="quiz-detail quiz-detail-title">{{$result->quiz->name}}</p>
                                <p class="quiz-detail mt-lg-4"><i
                                        class="fa fa-check"></i> {{$result->answers->count()}}
                                    сұрақ</p>
                                <div class="d-block d-lg-flex">
                                    <p class="quiz-detail"><i
                                            class="fa fa-calendar"></i> {{$result->quiz->subject->name}}</p>
                                </div>
                                <p class="quiz-detail"><i
                                        class="fa fa-money-bill-wave-alt"></i>
                                    @if($result->order->price)
                                        {{$result->order->price}}
                                    @else
                                        {{$result->quiz->price}}
                                    @endif
                                    тг
                                </p>
                                <p class="quiz-detail">
                                    <b>
                                        <i class="fa fa-check"></i>
                                        Нәтиже: {{$result->result .' / '.$result->all_score}}
                                    </b>
                                </p>
                                <button class="btn btn-link btn-block text-right stretched-link" type="button"
                                        data-toggle="collapse"
                                        data-target="#collapse{{$result->id}}" aria-expanded="true"
                                        aria-controls="collapseOne">
                                    Жауаптарды көру
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="collapse{{$result->id}}" class="collapse hide" aria-labelledby="headingOne"
                     data-parent="#accordionExample">
                    <div class="card-body">
                        @if($result->answers)
                            <ul>
                                @foreach($result->answers as $answer)
                                    <div class="alert alert-{{$answer->is_right ? 'success' : 'danger'}}" role="alert">
                                        <h4 class="alert-heading">{!! $answer->answer->question->question_text  !!} </h4>
                                        <p>{{ $answer->answer->answer  }}</p>
                                        <ul>
                                            @foreach($answer->answer->question->answers as $option)
                                                <li>{{$option->answer}}
                                                    @if($option->is_right)
                                                        <i class="fa fa-check"></i>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </ul>
                        @endif
                        @if(!$result->not_answered_questions->isEmpty())
                            <hr>
                            Жауап берілмеген сұрақтар
                            <ul>
                                @foreach($result->not_answered_questions as $question)
                                    <div class="alert alert-danger" role="alert">
                                        <h4 class="alert-heading">{!! $question->question_text  !!} </h4>
                                        <ul>
                                            @foreach($question->answers as $option)
                                                <li>{{$option->answer}}
                                                    @if($option->is_right)
                                                        <i class="fa fa-check"></i>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

            @endforeach
            @if($results->isEmpty())
                <h4 class="text-center">Тесттар табылған жоқ!</h4>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
@endsection
