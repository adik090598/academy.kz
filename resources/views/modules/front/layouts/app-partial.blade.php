<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    @include('modules.admin.parts.head')
    @include('modules.admin.parts.styles')
    @yield('styles')
</head>
<body>

<main class="d-flex flex-column u-hero u-hero--end mnh-100vh">
    @include('modules.front.parts.navigation')
        @yield('content')
</main>
@include('modules.admin.parts.scripts')
@yield('scripts')
</body>
</html>
