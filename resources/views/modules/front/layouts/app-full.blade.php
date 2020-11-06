<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    @include('modules.front.parts.head')
    @include('modules.front.parts.styles')
    @yield('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
@include('modules.front.parts.homeNavigation')
<div class="container">
    <main class="d-flex flex-column u-hero u-hero--end mnh-100vh">
        <div class="row justify-content-between">
            @include('modules.front.parts.account')
            <div class="mainPart col-md-8" style="width: 100%">
                @yield('content')
            </div>
        </div>
    </main>
</div>

@include('modules.front.parts.scripts')
@yield('scripts')
</body>
</html>
