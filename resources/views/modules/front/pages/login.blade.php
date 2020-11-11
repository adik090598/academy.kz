@extends('modules.front.layouts.app-auth')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-7 col-xl-9 order-lg-4">
            <div class="justify-content-start mt-2 mt-lg-5 ml-lg-5">
                <a href="{{route('welcome')}}" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Назад</a>
            </div>
            <div class="row justify-content-center p-4 align-items-center mt-lg-5">
                <div class="col-12 text-center">
                    <h2 class="logo-text">Academy</h2>
                    <h5>Вход</h5>
                </div>
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Электронная почта</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="example@example.ru">
                        <small id="emailHelp" class="form-text text-muted">Мы никогда никому не передадим вашу
                            электронную
                            почту.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Пароль</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="**********">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">Войти <i class="fas fa-sign-in-alt"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 col-xl-3 d-flex left-img p-0 col-12 justify-content-center">
            <img src="{{asset('modules/front/assets/img/background_login.png')}}" class="d-none d-lg-flex login-image"
                 alt="img">
            <img src="{{asset('modules/front/assets/img/mobile_login.png')}}" class="d-lg-none d-flex login-image"
                 alt="img">
        </div>
    </div>
@endsection
