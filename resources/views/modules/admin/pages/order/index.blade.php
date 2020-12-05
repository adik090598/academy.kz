@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Заявки</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Тесты</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <h2 class="h4 card-header-title">Заявки</h2>
                </header>
                <div class="card-body pt-0">
                    @if($orders->items())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ползователь</th>
                                <th>Тест</th>
                                <th>Создан</th>
                                <th>Цена</th>
                                <th>Статус</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td><a href="{{route('order.get', ['id' => $order->id])}}">{{$order->user->name}}</a></td>
                                    <td>{{$order->quiz->name}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->price ."тг."}}</td>
                                    <td>
                                        @if($order->status==0)
                                            <span class="badge bg-warning text-light">Күтілуде {{$order->status}}</span>
                                        @elseif($order->status==1)
                                            <span class="badge bg-secondary text-light">Қабылданды {{$order->status}}</span>
                                        @elseif($order->status==2)
                                            <span class="badge bg-primary text-light">Тапсырды {{$order->status}}</span>
                                        @endif
                                    </td>
                                    <td class="d-inline-block">
                                        <a href="#" class="btn btn-outline-success btn-sm">
                                            <i class="ti ti-check"></i>
                                        </a>
                                        <button class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{$order->id}}"><i class="ti-thumb-down"></i>
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal modal-backdrop" id="editquiz{{$order->id}}" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title w-100" id="myModalLabel">Редактировать категорию</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('quiz.update')}}" method="post">
                                                    <x-admin.input-form-group-list
                                                        :errors="$errors"
                                                        :elements="\App\Http\Forms\Web\V1\OrderWebForm::inputGroups($order)"/>
                                                    <button type="submit" class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
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

                            @endforeach
                            </tbody>
                        </table>
                    @else <h6>У вас пока нет заявок!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
