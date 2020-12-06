@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Результаты</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Результаты</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <h2 class="h4 card-header-title">Результаты</h2>
                </header>
                <div class="card-body pt-0">
                    @if($results->items())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Тест</th>
                                <th>Результат</th>
                                <th>Создан</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{$result->id}}</td>
                                    <td><a href="{{route('result.user',['id'=>$result->id])}}">{{$result->order->user->fullname()}}</a></td>
                                    <td>{{$result->quiz->name}}</td>
                                    <td>{{$result->result .' / '.$result->all_score}}</td>
                                    <td>{{$result->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$results->links()}}
                    @else <h6>У вас пока нет результатов!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
