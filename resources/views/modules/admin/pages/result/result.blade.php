@extends('modules.admin.layouts.app-full')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('result.index')}}">Результаты</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$result->id}}</li>
        </ol>
    </nav>

    <h1 class="h2 mb-2">{{$result->order->user->fullname()}}</h1>
    <h1 class="h2 mb-2">Тест: {{$result->quiz->name}}</h1>
    <h1 class="h2 mb-2">Результат: {{$result->result .' / '.$result->all_score}}</h1>
    <hr>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <h2 class="h4 card-header-title">Вопросы</h2>
                </header>
                <div class="card-body pt-0">
                    @if($result)
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Вопрос</th>
                                <th>Ответ участника</th>
                                <th>Все ответы</th>
                                <th>Балл</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($result->answers as $answer)
                                <tr  style="background: {{ $answer->is_right ? "#AFEDD7" : "#FFD1C9" }}">
                                    <td>{{ $answer->answer->question->id }}</td>
                                    <td style="max-width: 100px">{!! $answer->answer->question->question_text !!}</td>
                                    <td style="max-width: 100px">{!! $answer->answer->answer !!}</td>
                                    <td>
                                        <ul style="list-style: none">
                                            @foreach($answer->answer->question->answers as $option)
                                                <li>
                                                    <h3><span class="badge {{ $option->is_right ? "badge-primary" : "badge-light" }} ">{{$option->answer}}</span></h3>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{$answer->answer->is_right}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else <h6>У вас пока нет результатов!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
