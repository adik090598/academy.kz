<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    @include('modules.front.parts.head')
    @include('modules.front.parts.styles')
    @yield('styles')
</head>
<body>
<x-admin.error-header/>
<main class="u-error-content-wrap">
    @yield('content')
</main>
@include('modules.front.parts.scripts')
@yield('scripts')
</body>
</html>
