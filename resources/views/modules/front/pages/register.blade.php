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
                    <h5>Тіркелу</h5>
                </div>
                <form class="col-12 col-lg-6 col-sm-8 col-xl-6 mt-2">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control"
                               value="{{old('name')}}"
                               placeholder="Аты">
                    </div>
                    <div class="form-group">
                        <input type="text" name="surname" class="form-control"
                               value="{{old('fsurname')}}"
                               placeholder="Тегі">
                    </div>
                    <div class="form-group">
                        <input type="text" name="father_name" class="form-control"
                               value="{{old('father_name')}}"
                               placeholder="Әкесінің аты">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" id="phone"
                               inputmode="numeric"
                               value="{{old('phone')}}"
                               placeholder="Байланыс нөмері">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control"
                               value="{{old('email')}}"
                               placeholder="academy@gmail.com">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control"
                               value="{{old('password')}}"
                               placeholder="Құпия сөз">
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" class="form-control"
                               value="{{old('confirm_password')}}"
                               placeholder="Құпия сөзді қайталаңыз">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">Тіркелу <i class="fas fa-sign-in-alt"></i></button>
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
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $("#phone").mask("+7(799) 999-99-99");

    </script>
@endsection
