<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    @include('modules.front.parts.head')

    <title>Войти</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    @include('modules.front.parts.styles')
</head>
<body>
<div class="container-fluid">
    @yield('content')
</div>
@include('modules.front.parts.scripts')
@yield('scripts')
</body>
</html>
