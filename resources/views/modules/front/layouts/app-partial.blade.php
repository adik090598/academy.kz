<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    @include('modules.front.parts.head')
    @include('modules.front.parts.styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/vendor/bootstrap/dist/css/bootstrap.min.css')}}">
    @yield('styles')
</head>
<body>
@include('modules.front.parts.navigation')
<main class="d-flex flex-column u-hero u-hero--end mnh-100vh">
        @yield('content')
</main>
@include('modules.front.parts.footer')
@include('modules.front.parts.scripts')
@yield('scripts')
</body>
</html>
