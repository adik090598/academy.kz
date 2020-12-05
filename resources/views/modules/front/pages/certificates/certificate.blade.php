<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Certificate</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,600i&display=swap" rel="stylesheet">
    {{--    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">--}}
    <style>

        @page {
            size: A4;
        }

        @page :first {
            margin: 0;
        }

        @page :left {
            margin: 0;
        }

        @page :right {
            margin: 0;
        }

        @media print {

            html, body {
                height: 100%;
                margin: 0 !important;
                padding: 0 !important;
                overflow: hidden;
                -webkit-print-color-adjust: exact;
            }

        }

        @media print {
            body * {
                visibility: hidden;
            }

            #section-to-print, #section-to-print * {
                visibility: visible;
            }

            #section-to-print {
                position: absolute;
                left: 0;
                top: 0;
            }
        }


        body {
            position: relative;
            width: 27.8cm;
            height: 100%;
        }

        .image {
            position: absolute;
            top: 0;
            left: 0;
            object-fit: cover;
            width: 27.7cm;
            height: 40.0cm;
        }

        .container {
            position: absolute;
            width: 100%;
            text-align: center;
        }

        .inner-container {
            position: relative;
            padding-top: 682px;
        }

        .inner-container-default {
            position: relative;
            padding-top: 680px;
        }

        .place {
            font-size: 24px;
            margin-left: 26%;
        }

        .school {
            font-size: 24px;
            margin-left: 26%;
            padding-top: 3px;
        }

        .class-educated {
            font-size: 24px;
            margin-left: -200px;
            padding-top: 5px;

        }

        .fullname {
            font-size: 24px;
            padding-top: 0 ;
            margin-left: 26%;
            color: red;

        }


    </style>
</head>
<body>

<div class="container" id="section-to-print">
    @if($result->certificate_type != \App\Models\Entities\QuizResult::DEFAULT
    && $result->certificate_type != \App\Models\Entities\QuizResult::DEFAULT_TEACHER)
        @if($result->certificate_type == \App\Models\Entities\QuizResult::FIRST_PLACE)
            <img class="image" src="{{asset('/certs/first-place.jpg')}}">
        @elseif($result->certificate_type == \App\Models\Entities\QuizResult::SECOND_PLACE)
            <img class="image" src="{{asset('/certs/second-place.jpg')}}">
        @else
            <img class="image" src="{{asset('/certs/third-place.jpg')}}">
        @endif
        <div class="inner-container">
            <p class="place">{{$result->city}} қаласы, {{$result->area}}</p>
            <p class="school">{{$result->school}}</p>
            <p class="class-educated">{{$result->class_number}} "{{$result->class_letter}}"</p>
            <p class="fullname">{{$result->surname .' '. $result->name .' '. $result->father_name}}</p>
        </div>
    @else
        <img class="image" src="{{asset('/certs/default.jpg')}}">
        <div class="inner-container-default">
            <p class="place">{{$result->city}} қаласы, {{$result->area}}</p>
{{--            <p class="school">{{$result->school}}</p>--}}
{{--            <p class="class-educated">{{$result->class_number}} "{{$result->class_letter}}"</p>--}}
            <p class="fullname">{{$result->surname .' '. $result->name .' '. $result->father_name}}</p>
        </div>
    @endif
</div>


</body>
<script type="text/javascript">
    $(document).ready(() => {
        window.print();
    });
</script>
</html>



