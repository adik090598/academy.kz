@extends('modules.front.layouts.app-full')

@section('content')
    <div class="container pt-5" style="min-height: 766px; outline: none">
        <div class="d-flex col-12">
            <a href="{{route('welcome')}}" class="back-button"><i class="fa fa-arrow-circle-left"></i> Негізгі бет</a>
        </div>
        <div class="row justify-content-between">
            <div class="col-md-3">
                <div class="account">
                    <a class="dropdown-item" href="{{route('profile.quizzes')}}"><i class="fa fa-list"></i> Менің тесттарым</a></li>
                    <a class="dropdown-item" href="{{route('profile.certificates')}}"><i class="fa fa-file"></i> Менің сертификаттарым</a></li>
                </div>
            </div>
            <div class="col-md-8">
                <div class="col-md-12 clearfix">
                    <div class="btn-group float-right" role="group" aria-label="Basic example">
                        <button type="button" id="orderBtn" class="btn btn-primary" data-toggle="collapse" data-target="#ordersCollapse" aria-expanded="false" aria-controls="ordersCollapse">Тапсырыстар</button>
                        <button type="button" id="resultBtn" class="btn btn-outline-primary" data-toggle="collapse" data-target="#resultsCollapse" aria-expanded="false" aria-controls="resultsCollapse">Тест нәтиежелері</button>
                    </div>
                </div>
                <div class="card-body" id="ordersCollapse">
                    @foreach($orders as $order)
                        <div class="card col-12 p-0 mb-4">
                            <div class="card-body p-0">
                                <div class="d-flex">
                                    <div class="col-5 col-lg-4 p-0">
                                        <img src="{{asset($order->quiz->image_path)}}" alt="" class="quiz-img">
                                    </div>
                                    <div class="col-7 col-lg-8 p-1 pr-3 d-block mt-1">
                                        <p class="quiz-detail quiz-detail-title">{{$order->quiz->name}}</p>
                                        <div class="d-block d-lg-flex">
                                        </div>
                                        <p class="quiz-detail"><i
                                                class="fa fa-money-bill-wave-alt"></i>
                                            @if($order->price)
                                                {{$order->price}}
                                            @endif
                                            тг
                                        </p>
                                        <p class="quiz-detail"><i
                                                class="fa fa-id-card"></i> Тапсырыс ID нөмері: {{$order->id}}</p>
                                        <p class="quiz-detail">
                                            @if($order->status == \App\Models\Entities\Order::ACCEPTED)
                                            <b>
                                                <i class="fa fa-check"></i>
                                                Статус: {{$order->status_text}}
                                            </b>
                                            @elseif($order->status == \App\Models\Entities\Order::PROCESS)
                                                <i class="fas fa-hourglass-start"></i>
                                                    Статус: <b>{{$order->status_text}}</b>
                                            @endif
                                        </p>
                                        @if($order->status == \App\Models\Entities\Order::ACCEPTED)
{{--                                            <form action="{{route('quiz.start',['id' => $order->id])}}" method="POST">--}}
{{--                                                <button type="submit" class="btn btn-primary ml-auto float-right">Тапсыру</button>--}}
{{--                                                @csrf--}}
{{--                                            </form>--}}
                                            <a href="{{route('quiz.start',['id' => $order->id])}}"
                                               class="btn btn-primary ml-auto float-right">Тапсыру</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>
                <div class="card-body" id="resultsCollapse">
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
        </div>
        </div>
@endsection

@section('scripts')
    <script>
        $('#ordersCollapse').on('shown.bs.collapse', function () {
            $('#orderBtn').removeClass('btn-outline-primary');
            $('#orderBtn').addClass('btn-primary');
        });

        $('#ordersCollapse').on('hidden.bs.collapse', function () {
            $('#orderBtn').removeClass('btn-primary');
            $('#orderBtn').addClass('btn-outline-primary');
        });
        $('#resultsCollapse').on('shown.bs.collapse', function () {
            $('#orderBtn').removeClass('btn-outline-primary');
            $('#orderBtn').addClass('btn-primary');
        });
        $('#resultsCollapse').on('hidden.bs.collapse', function () {
            $('#resultBtnBtn').removeClass('btn-primary');
            $('#resultBtnBtn').addClass('btn-outline-primary');
        });
    </script>
@endsection
