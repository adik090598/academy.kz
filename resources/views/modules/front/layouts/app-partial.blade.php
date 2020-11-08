<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    @include('modules.front.parts.head')
    @include('modules.front.parts.styles')
</head>
<body>
@include('modules.front.parts.top-banner')
@if($agent->isDesktop())
    @include('modules.front.parts.navigation')
@elseif($agent->isMobile())
    @include('modules.front.parts.mobile.mobileNav')
@endif
<main class="d-flex flex-column u-hero u-hero--end mnh-100vh">
        @yield('content')
</main>
@include('modules.front.parts.footer')
@include('modules.front.parts.scripts')
</body>
</html>
