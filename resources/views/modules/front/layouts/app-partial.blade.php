<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    @include('modules.front.parts.head')
    @include('modules.front.parts.styles')
    @yield('styles')
</head>
<body>

<main class="d-flex flex-column u-hero u-hero--end mnh-100vh">
    @include('modules.front.parts.navigation')
        @yield('content')
</main>
@include('modules.front.parts.scripts')
@yield('scripts')
</body>
</html>
