@extends('modules.front.layouts.app-auth')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-7 col-xl-9 order-lg-4">
            <div class="justify-content-start mt-2 mt-lg-5 ml-lg-5">
                <a href="{{route('welcome')}}" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i>
                    Назад</a>
            </div>
            <div class="row justify-content-center p-4 align-items-center">
                <div class="col-12 text-center">
                    <h2 class="logo-text">Akadem</h2>
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
                        <select class="form-control{{ isset($errors) && $errors->has('role_id') ? ' is-invalid' : '' }}"
                                name="role_id"
                                id="role_id"
                                onchange="chooseRole()"
                                required>
                            <option value="">Рөль</option>
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
                        <select type="text" name="region_id"
                                id="region_id"
                                class="form-control{{ isset($errors) && $errors->has('region_id') ? ' is-invalid' : '' }}"
                                onchange="chooseRegion()"
                                required>
                            <option value="">Облыс</option>
                            @foreach($regions as $region)
                                <option value="{{$region->id}}">{{$region->name}}</option>
                            @endforeach
                        </select>
                        @if (isset($errors) && $errors->has('region_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('region_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <select type="text" name="city_id"
                                id="city_id"
                                class="form-control{{ isset($errors) && $errors->has('city_id') ? ' is-invalid' : '' }}"
                                onchange="chooseCity()"
                                hidden
                                required>
                            <option value="">Қала</option>
                        </select>
                        @if (isset($errors) && $errors->has('city_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('city_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <select type="text" name="area_id"
                                id="area_id"
                                class="form-control{{ isset($errors) && $errors->has('area_id') ? ' is-invalid' : '' }}"
                                onchange="chooseArea()"
                                hidden
                                required>
                            <option value="">Аудан</option>
                        </select>
                        @if (isset($errors) && $errors->has('area_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('area_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <select type="text" name="school_id"
                                id="school_id"
                                class="form-control{{ isset($errors) && $errors->has('school_id') ? ' is-invalid' : '' }}"
                                hidden
                                required>
                            <option value="">Мектеп</option>
                        </select>
                        @if (isset($errors) && $errors->has('area_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('school_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-12 row" id="class-number-letter" hidden>
                        <select type="text" name="class_number"
                                id="class_number"
                                class="form-control{{ isset($errors) && $errors->has('class_number') ? ' is-invalid' : '' }} col-5">
                            <option value="">Сынып</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                        </select>
                        @if (isset($errors) && $errors->has('class_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('class_number') }}</strong>
                            </span>
                        @endif
                        <input type="text" name="class_letter"
                               id="class_letter"
                               maxlength="1"
                               placeholder="AБВ"
                               class="form-control{{ isset($errors) && $errors->has('class_letter') ? ' is-invalid' : '' }} col-5 ml-3"
                               style="text-transform:uppercase"/>
                        @if (isset($errors) && $errors->has('class_letter'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('class_letter') }}</strong>
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
                        <select class="form-control{{ isset($errors) && $errors->has('subject_id') ? ' is-invalid' : '' }}"
                                name="subject_id" id="subject_id" hidden>
                            <option value="">Сабақ</option>
                        @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                        @if (isset($errors) && $errors->has('subject_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('subject_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="email"
                               class="form-control{{ isset($errors) && $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email"
                               value="{{old('email')}}"
                               placeholder="Akadem@gmail.com"
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
                        <a class="ml-3" href="{{route('login.form')}}">Уже есть аккаунт?</a>
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
        var regions = {!! $regions !!};
        var cities = {!! $cities !!};
        var areas = {!! $areas !!};
        var schools = {!! $schools !!};

        function chooseRegion() {
            var region_id = document.getElementById('region_id').value;
            var city_id = document.getElementById('city_id');
            var area_id = document.getElementById('area_id');
            var school_id = document.getElementById('school_id');
            var chosen_cities = cities.filter(o => o.region_id == region_id);
            emptySelect(area_id);
            emptySelect(school_id);
            emptySelect(city_id);
            chosen_cities.forEach(function (e) {
                var opt = document.createElement('option');
                opt.value = e.id;
                opt.innerHTML = e.name;
                city_id.appendChild(opt);
            });
            city_id.hidden = false;
            area_id.hidden = true;
            school_id.hidden = true;
        }

        function chooseCity() {
            var city_id = document.getElementById('city_id').value;
            var area_id = document.getElementById('area_id');
            var school_id = document.getElementById('school_id');
            var chosen_areas = areas.filter(o => o.city_id == city_id);
            emptySelect(area_id);
            emptySelect(school_id);

            chosen_areas.forEach(function (e) {
                var opt = document.createElement('option');
                opt.value = e.id;
                opt.innerHTML = e.name;
                console.log(e);
                area_id.appendChild(opt);
            });

            area_id.hidden = false;
            school_id.hidden = true;
        }

        function chooseArea() {
            var area_id = document.getElementById('area_id').value;
            var school_id = document.getElementById('school_id');
            var chosen_schools = schools.filter(o => o.area_id == area_id);
            emptySelect(school_id);
            chosen_schools.forEach(function (e) {
                var opt = document.createElement('option');
                opt.value = e.id;
                opt.innerHTML = e.name;
                school_id.appendChild(opt);
            });
            school_id.hidden = false;
        }

        function chooseRole() {
            var role_id = document.getElementById('role_id');
            var class_number = document.getElementById('class-number-letter');
            var subject_id =  document.getElementById('subject_id');
            if(role_id.value == 2) {
                document.getElementById('class_letter').required = true;
                document.getElementById('class_number').required = true;
                class_number.hidden = false;
                subject_id.hidden = true;

            } else if(role_id.value == 3) {
                subject_id.hidden = false;
                subject_id.required = true;
                class_number.hidden = true;

            } else {
                class_number.hidden = true;
                subject_id.hidden = true;
            }

        }

        function emptySelect(element) {
            for (var i = 0; i < element.length; i++) {
                if (element[i].value != "")
                    element.remove(i);
            }
        }
    </script>
@endsection
