@extends('modules.front.layouts.app-auth')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-7 col-xl-9 order-lg-4">
            <div class="justify-content-start mt-2 mt-lg-5 ml-lg-5">
                <a href="{{route('welcome')}}" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i>
                    Назад</a>
            </div>
            <div class="row justify-content-center p-4 align-items-center mt-lg-5">
                <div class="col-12 text-center">
                    <h2 class="logo-text">Academy</h2>
                    <h5>Тіркелу</h5>
                </div>
                <form class="col-12 col-lg-6 col-sm-8 col-xl-6 mt-2" method="POST" action="{{route('register')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" name="name"
                               class="form-control{{ isset($errors) && $errors->has('name') ? ' is-invalid' : '' }}"
                               value="{{old('name')}}"
                               placeholder="Аты"
                               required>
                        @if (isset($errors) && $errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" name="surname"
                               class="form-control{{ isset($errors) && $errors->has('surname') ? ' is-invalid' : '' }}"
                               value="{{old('surname')}}"
                               placeholder="Тегі"
                               required>
                    @if (isset($errors) && $errors->has('surname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('surname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" name="father_name"
                               class="form-control{{ isset($errors) && $errors->has('father_name') ? ' is-invalid' : '' }}"
                               value="{{old('father_name')}}"
                               placeholder="Әкесінің аты"
                               required>
                    @if (isset($errors) && $errors->has('father_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('father_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" id="phone"
                               class="form-control{{ isset($errors) && $errors->has('phone') ? ' is-invalid' : '' }}"
                               inputmode="numeric"
                               value="{{old('phone')}}"
                               placeholder="Байланыс нөмері"
                               required>
                    @if (isset($errors) && $errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <select class="form-control{{ isset($errors) && $errors->has('role_id') ? ' is-invalid' : '' }}"
                                name="role_id">
                                <option value="2">Оқушы</option>
                                <option value="3">Мұғалім</option>
                        </select>
                        @if (isset($errors) && $errors->has('role_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('role_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="email"
                               class="form-control{{ isset($errors) && $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email"
                               value="{{old('email')}}"
                               placeholder="academy@gmail.com"
                               required>
                        @if (isset($errors) && $errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password"
                               class="form-control{{ isset($errors) && $errors->has('password') ? ' is-invalid' : '' }}"
                               value="{{old('password')}}"
                               placeholder="Құпия сөз"
                               required>
                        @if (isset($errors) && $errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation"
                               class="form-control{{ isset($errors) && $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                               value="{{old('confirm_password')}}"
                               placeholder="Құпия сөзді қайталаңыз"
                               required>
                        @if (isset($errors) && $errors->has('confirm_password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('confirm_password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">Тіркелу <i
                                class="fas fa-sign-in-alt"></i></button>
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
