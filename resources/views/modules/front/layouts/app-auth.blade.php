<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    @include('modules.front.parts.head')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/auth.css')}}">
</head>
<body>
<div class="wrapper">
    @yield('content')
<div>
</body>
</html>
