@extends('modules.front.layouts.app-auth')
@section('content')

    <div class="auth-form col-md-3">
        <div class="header-text text-center">
            <h2 class="logo-text">Academi</h2>
            <h5 class="text-left">Вход</h5>
        </div>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Электронная почта</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@example.ru">
                <small id="emailHelp" class="form-text text-muted">Мы никогда никому не передадим вашу электронную почту.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="**********">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
            </div>
            <button type="submit" class="btn float-right">Войти</button>
        </form>
    </div>

@endsection
