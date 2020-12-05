@extends('modules.front.layouts.app-full')
@section('content')
    <div class="container pt-5" style="min-height: 766px;">
        <div class="certificates">
            @foreach($results as $result)
                <a href="#" class="card credentialing">
                    <div class="overlay"></div>
                    <div class="circle">
                        1qu
                    </div>
                    <h5>{{$result->quiz->name}}</h5>
                    <h6>{{$result->quiz->subject->name}}</h6>
                </a>
            @endforeach
        </div>
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
                                        Нәтиже: {{$result->result .' / '.$result->answers->count()}}
                                    </b>
                                </p>
                                <a href="{{route('profile.certificate',['id'=> $result->id])}}" target="_blank" class="btn btn-link btn-block text-right stretched-link">
                                    Сертификатты басып алу
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if($results->isEmpty())
                <h4 class="text-center">Сертификаттар табылған жоқ!</h4>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
@endsection
