<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            outline: none;
        }
        body{
            background-color: #eeeeee;
            font-family: "Be Vietnam", "Open Sans";
            font-style: normal;
            font-weight: normal;
            font-size: 18px;
            line-height: 20px;
        }
        a{
            text-decoration: none;
        }

        p, li, a{
            font-size: 14px;
        }
        .mainPart{
            width: 100%;
        }

        .pagination{
            margin: 0 auto;
            padding: 30px 0;
        }

        .pagination ul{
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .pagination a{
            display: inline-block;
            padding: 10px 18px;
            color: #222;
        }
        /* TWELVE */
        .p12{
            color: #fff;
            font-weight: bold;
        }
        .p12 .is-active{
            background-color: #00A0A3;
            color: #fff;
            font-weight: bold;
        }

        .quizArea{

            margin:  auto;
            padding: 10px;
            position: relative;
            text-align: center;
        }

        .progress_items{
            border-top: 1px solid #00A0A3;
            border-bottom: 1px solid #00A0A3;
        }

        .progress_items:first-child{
            border-left: 1px solid #00A0A3;
            border-bottom-left-radius: 10px;
            border-top-left-radius: 10px;
        }
        .progress_items:last-child{
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
            border-right: 1px solid #00A0A3;
        }

        .multipleChoiceQues{

            margin: auto;
            padding: 10px;
            color: #323232;

        }
        .quizBox
        {
            margin: auto;
        }

        .question{
            text-align: center;
            color: #323232;
        }

        .question p{
            font-size: 1em;
        }

        .answerOptions{
            color: #323232;
        }

        .buttonArea
        {
            height: 4.5em;
        }

        .buttonArea button {
            height: 40px;
            padding: 0.75em 1em;
            margin: 1em auto;
            border: none;
            background: #00A0A3;
            border-radius: 10px;
            color: #eeeeee;
            font-family: "Be Vietnam", "Open Sans";
            font-style: normal;
            font-weight: bold;
            font-size: 16px;
            line-height: 16px;
            transition: all 0.2s cubic-bezier(.4,0,.2,1);
        }

        #next:hover,
        #previous:hover,
        #submit:hover,
        .viewanswer:hover,
        .viewchart:hover,
        .backBtn:hover,
        .replay:hover {
            text-decoration: underline;
            cursor: pointer;
        }
        .viewanswer,
        .viewchart,
        .replay{
            width: 30%;
        }

        .backBtn{
            width:100px;
            height: 2em;
            font-size: 0.8em;
            margin-left: 70%;
        }
        #next:active,
        #previous:active,
        #submit:active,
        .viewanswer:active,
        .viewchart:active,
        .backBtn:active,
        .replay:active  {
            background: #0e9f6e;
        }

        .resultArea{
            display: none;
            width:70%;
            margin: auto;
            padding: 10px;

        }

        .chartBox{
            width: 60%;
            margin:auto;
        }

        .resultPage1{

            text-align: center;

        }
        .resultBox h1{

        }

        .briefchart
        {
            text-align:center;
        }

        .resultBtns{
            width: 60%;
            margin: auto;
            text-align:center;
        }
        .resultPage2,
        .resultPage3
        {
            display: none;
            text-align: center;
        }

        .allAnswerBox{
            width: 100%;
            margin: 0;
            position: relative;
        }

        ._resultboard{
            position: relative;
            display:inline-block;
            width: 40%;
            padding: 2%;
            height: 190px;
            vertical-align: top;
            border-bottom: 0.6px solid rgba(255,255,255,0.2);
            text-align: left;
            margin-bottom: 4px;

        }

        ._resultboard:nth-child(even){


            margin-left: 5px;
            border-left: 0.6px solid rgba(255,255,255,0.2);
        }
        ._resultboard:nth-last-child(2),
        ._resultboard:nth-last-child(1){
            border-bottom: 0px;
        }

        ._header{
            font-weight: bold;
            margin-bottom: 8px;
            height: 90px;
        }

        ._yourans,
        ._correct{
            margin-bottom: 8px;
            position: relative;
            line-height: 2;
            padding: 5px;
        }
        ._correct{
            background: #968089 ;
        }
        .h-correct{
            background: #968089;

        }

        .h-correct:after,
        ._correct:after {
            line-height: 1.4;
            position: absolute;
            z-index: 499;
            font-family: 'FontAwesome';
            content: "\f00c";
            bottom: 0;
            right: 7px;
            font-size: 1.9em;
            color: #2dceb1;
        }
        .h-incorrect{
            background: #ab4e6b ;
        }
        .h-incorrect:after {
            line-height: 1.4;
            position: absolute;
            z-index: 499;
            font-family: 'FontAwesome';
            content: "\f00d";
            bottom: 0;
            right: 7px;
            font-size: 1.9em;
            color: #ff383e;
        }

        .resultPage3 h1,
        .resultPage1 h1,
        .resultPage2 h1{
            text-align: center;
            padding-bottom: 10px;
            border-bottom: 1.3px solid rgba(21, 63, 101,0.9);
            color: #3a5336;
        }

        .my-progress {
            position: relative;
            display: block;
            margin: 3rem auto 0rem;
            width: 100%;
            max-width: 950px;
        }

        progress {
            display: block;
            position: relative;
            top: -0.5px;
            left: 5px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: #f1f2ec ;
            width: 100%;
            height: 2.5px;
            background: none;
            -webkit-transition: 1s;
            transition: 1s;
            will-change: contents;
        }
        progress::-webkit-progress-bar {
            background-color: #f1f2ec;
        }
        progress::-webkit-progress-value {
            background-color:#153f65;
            -webkit-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
        }

        .my-progress-indicator {
            position: absolute;
            top: -6px;
            left: 0;
            display: inline-block;
            width: 5px;
            height: 5px;
            background: #7aa4a9;
            border: 3px solid #f1f2ec;
            border-radius: 50%;
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            -webkit-transition-delay: .3s;
            transition-delay: .3s;
            will-change: transform;
        }
        .my-progress-indicator.progress_1 {
            left: 0;
        }
        .my-progress-indicator.progress_2 {
            left: 9%;
        }
        .my-progress-indicator.progress_3 {
            left: 18%;
        }
        .my-progress-indicator.progress_4{
            left: 27%;
        }
        .my-progress-indicator.progress_5 {
            left: 36%;
        }
        .my-progress-indicator.progress_6 {
            left: 45%;
        }
        .my-progress-indicator.progress_7 {
            left: 54%;
        }
        .my-progress-indicator.progress_8 {
            left: 63%;
        }
        .my-progress-indicator.progress_9 {
            left: 72%;
        }
        .my-progress-indicator.progress_10 {
            left: 81%;
        }
        .my-progress-indicator.progress_11 {
            left: 90%;
        }
        .my-progress-indicator.progress_12 {
            left: 100%;
        }
        .my-progress-indicator.active {
            -webkit-animation: bounce .5s forwards;
            animation: bounce .5s forwards;
            -webkit-animation-delay: .5s;
            animation-delay: .5s;
            border-color: #153f65 ;

        }

        .animation-container {
            position: relative;
            width: 100%;
            -webkit-transition: .3s;
            transition: .3s;
            will-change: padding;
            overflow: hidden;
        }

        .form-step {
            position: absolute;
            -webkit-transition: 1s ease-in-out;
            transition: 1s ease-in-out;
            -webkit-transition-timing-function: ease-in-out;
            transition-timing-function: ease-in-out;
            will-change: transform, opacity;
        }

        .form-step.leaving {
            -webkit-animation: left-and-out .5s forwards;
            animation: left-and-out .5s forwards;
        }

        .form-step.waiting {
            -webkit-transform: translateX(400px);
            transform: translateX(400px);
        }

        .form-step.coming {
            -webkit-animation: right-and-in .5s forwards;
            animation: right-and-in .5s forwards;
        }

        @-webkit-keyframes left-and-out {
            100% {
                opacity: 0;
                -webkit-transform: translateX(-400px);
                transform: translateX(-400px);
            }
        }

        @keyframes left-and-out {
            100% {
                opacity: 0;
                -webkit-transform: translateX(-400px);
                transform: translateX(-400px);
            }
        }
        @-webkit-keyframes right-and-in {
            100% {
                opacity: 1;
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }
        }
        @keyframes right-and-in {
            100% {
                opacity: 1;
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }
        }
        @-webkit-keyframes bounce {
            50% {
                -webkit-transform: scale(1.5);
                transform: scale(1.5);
            }
            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }
        @keyframes bounce {
            50% {
                -webkit-transform: scale(1.5);
                transform: scale(1.5);
            }
            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            border: 0;
        }

        .hidden {
            display: none;
        }


        .answerOptions ul{
            list-style-type: none;
            width: 220px;
            margin: auto;
            text-align: left;
        }

        .answerOptions ul li {
            position: relative;
            padding: 10px;
            padding-left: 40px;
            height:30px;
        }
        .answerOptions label{
            color: #323232;
        }
        .answerOptions label:before {
            content: "";
            width: 15px;
            height: 15px;
            background: #00A0A3 ;
            position: absolute;
            left: 7px;
            top: calc(50% - 13px);
            box-sizing: border-box;
            border-radius: 50%;
        }

        .answerOptions input[type="radio"] {
            opacity: 0;
            -webkit-appearance: none;
            display: inline-block;
            vertical-align: middle;
            z-index: 100;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 30px;
            position: absolute;
            left: 0;
            top: calc(50% - 15px);
            cursor: pointer;
        }

        .bullet {
            position: relative;
            width: 25px;
            height: 25px;
            left: -3px;
            top: 2px;
            border: 5px solid #00A0A3 ;
            opacity: 0;
            border-radius: 50%;
            color: #323232;
        }

        input[type="radio"]:checked ~ .bullet {
            position:absolute;
            opacity: 1;
            animation-name: explode;
            animation-duration: 0.350s;
        }

        .line {
            position: absolute;
            width: 10px;
            height: 2px;
            background-color: #00A0A3 ;
            opacity:0;
        }

        .line.zero {
            left: 11px;
            top: -21px;
            transform: translateY(20px);
            width: 2px;
            height: 10px;
        }

        .line.one {
            right: -7px;
            top: -11px;
            transform: rotate(-55deg) translate(-9px);
        }

        .line.two {
            right: -20px;
            top: 11px;
            transform: translate(-9px);
        }

        .line.three {
            right: -8px;
            top: 35px;
            transform: rotate(55deg) translate(-9px);
        }

        .line.four {
            left: -8px;
            top: -11px;
            transform: rotate(55deg) translate(9px);
        }

        .line.five {
            left: -20px;
            top: 11px;
            transform: translate(9px);
        }

        .line.six {
            left: -8px;
            top: 35px;
            transform: rotate(-55deg) translate(9px);
        }

        .line.seven {
            left: 11px;
            bottom: -21px;
            transform: translateY(-20px);
            width: 2px;
            height: 10px;
        }

        input[type="radio"]:checked ~ .bullet .line.zero{
            animation-name:drop-zero;
            animation-delay: 0.100s;
            animation-duration: 0.9s;
            animation-fill-mode: forwards;
        }

        input[type="radio"]:checked ~ .bullet .line.one{
            animation-name:drop-one;
            animation-delay: 0.100s;
            animation-duration: 0.9s;
            animation-fill-mode: forwards;
        }

        input[type="radio"]:checked ~ .bullet .line.two{
            animation-name:drop-two;
            animation-delay: 0.100s;
            animation-duration: 0.9s;
            animation-fill-mode: forwards;
        }

        input[type="radio"]:checked ~ .bullet .line.three{
            animation-name:drop-three;
            animation-delay: 0.100s;
            animation-duration: 0.9s;
            animation-fill-mode: forwards;
        }

        input[type="radio"]:checked ~ .bullet .line.four{
            animation-name:drop-four;
            animation-delay: 0.100s;
            animation-duration: 0.9s;
            animation-fill-mode: forwards;
        }

        input[type="radio"]:checked ~ .bullet .line.five{
            animation-name:drop-five;
            animation-delay: 0.100s;
            animation-duration: 0.9s;
            animation-fill-mode: forwards;
        }

        input[type="radio"]:checked ~ .bullet .line.six{
            animation-name:drop-six;
            animation-delay: 0.100s;
            animation-duration: 0.9s;
            animation-fill-mode: forwards;
        }

        input[type="radio"]:checked ~ .bullet .line.seven{
            animation-name:drop-seven;
            animation-delay: 0.100s;
            animation-duration: 0.9s;
            animation-fill-mode: forwards;
        }

        @keyframes explode {
            0%{
                opacity: 0;
                transform: scale(10);
            }
            60%{
                opacity: 1;
                transform: scale(0.5);
            }
            100%{
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes drop-zero {
            0% {
                opacity: 0;
                transform: translateY(20px);
                height: 10px;
            }
            20% {
                opacity:1;
            }
            100% {
                transform: translateY(-2px);
                height: 0px;
                opacity:0;
            }
        }

        @keyframes drop-one {
            0% {
                opacity: 0;
                transform: rotate(-55deg) translate(-20px);
                width: 10px;
            }
            20% {
                opacity:1;
            }
            100% {
                transform: rotate(-55deg) translate(9px);
                width: 0px;
                opacity:0;
            }
        }

        @keyframes drop-two {
            0% {
                opacity: 0;
                transform: translate(-20px);
                width: 10px;
            }
            20% {
                opacity:1;
            }
            100% {
                transform: translate(9px);
                width: 0px;
                opacity:0;
            }
        }

        @keyframes drop-three {
            0% {
                opacity: 0;
                transform: rotate(55deg) translate(-20px);
                width: 10px;
            }
            20% {
                opacity:1;
            }
            100% {
                transform: rotate(55deg) translate(9px);
                width: 0px;
                opacity:0;
            }
        }

        @keyframes drop-four {
            0% {
                opacity: 0;
                transform: rotate(55deg) translate(20px);
                width: 10px;
            }
            20% {
                opacity:1;
            }
            100% {
                transform: rotate(55deg) translate(-9px);
                width: 0px;
                opacity:0;
            }
        }

        @keyframes drop-five {
            0% {
                opacity: 0;
                transform: translate(20px);
                width: 10px;
            }
            20% {
                opacity:1;
            }
            100% {
                transform: translate(-9px);
                width: 0px;
                opacity:0;
            }
        }

        @keyframes drop-six {
            0% {
                opacity: 0;
                transform: rotate(-55deg) translate(20px);
                width: 10px;
            }
            20% {
                opacity:1;
            }
            100% {
                transform: rotate(-55deg) translate(-9px);
                width: 0px;
                opacity:0;
            }
        }

        @keyframes drop-seven {
            0% {
                opacity: 0;
                transform: translateY(-20px);
                height: 10px;
            }
            20% {
                opacity:1;
            }
            100% {
                transform: translateY(2px);
                height: 0px;
                opacity:0;
            }
        }

        .timer-display{
            color: #666666;
        }

    </style>
</head>
<body>
<div class="row justify-content-between">
    <div class="mainPart col-md-12" >
        <div class="container">

            <div class="quizArea">
                <h1 id="time-display" class="timer-display">00:00</h1>
                <div class="pagination p12">
                    <ul class="progress_menu">
                    </ul>
                </div>
                <div class="multipleChoiceQues">
{{--                    <div class="my-progress">--}}
{{--                        <progress class="my-progress-bar" min="0" max="100" value="0" step="9" aria-labelledby="my-progress-completion"></progress>--}}
{{--                        <p id="my-progress-completion" class="js-my-progress-completion sr-only" aria-live="polite">0% complete</p>--}}
{{--                    </div>--}}
                    <div class="quizBox">
                        <div class="question">
                        </div>
                        <hr style="width: 50%">
                        <div class="answerOptions"></div>
                        <div class="buttonArea">
                            <button id="previous" class="hidden float-left">Алдыңғы сұрақ</button>
                            <button id="next" class="float-right">Келесі сұрақ</button>
                            <button id="submit"  class="hidden">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="resultArea">
                    <div class="resultPage1">
                        <div class="resultBox">
                            <h1>Result Summary</h1>
                        </div>
                        <div class="briefchart">
                            <svg height="300" width="300" id="_cir_progress">
                                <g>
                                    <rect x="0" y="1" width="30" height="15"  fill="#ab4e6b" />
                                    <text x="32" y="14" font-size="14"  class="_text_incor">Incorrect : 12 </text>
                                </g>
                                <g>
                                    <rect x="160" y="1" width="30" height="15"  fill="#968089" />
                                    <text x="192" y="14" font-size="14" class="_text_cor">Correct : 12</text>
                                </g>
                                <circle class="_cir_P_x" cx="150" cy="150" r="120" stroke="#ab4e6b" stroke-width="20" fill="none" onmouseover="evt.target.setAttribute('stroke', 'rgba(171, 78, 107,0.7)');" onmouseout="evt.target.setAttribute('stroke','#ab4e6b');"></circle>

                                <circle class="_cir_P_y" cx="150" cy="150" r="120" stroke="#968089" stroke-width="20"  stroke-dasharray="0,1000" fill="none"  onmouseover="evt.target.setAttribute('stroke', 'rgba(150, 128, 137,0.7)');" onmouseout="evt.target.setAttribute('stroke','#968089');"></circle>
                                <text x="50%" y="50%" text-anchor="middle" stroke="none" stroke-width="1px" dy=".3em" class="_cir_Per">0%</text>
                            </svg>
                        </div>

                        <div class="resultBtns">
                            <button class="viewanswer">View Answers</button>
                            <button class="viewchart">View Chart</button>
                            <button class="replay"><i class="fa fa-repeat" style="font-size:1em;"></i> <br/>Replay</button>
                        </div>
                    </div>

                    <div class="resultPage2">
                        <h1>Your Result</h1>
                        <div class="chartBox">
                            <canvas id="myChart" width="400" height="400"></canvas>
                        </div>
                        <button class="backBtn">Back</button>
                    </div>

                    <div class="resultPage3">
                        <h1>Your Answers</h1>
                        <div class="allAnswerBox">

                        </div>
                        <button class="backBtn">Back</button>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.js"></script>
<script src="https://raw.githubusercontent.com/emn178/Chart.PieceLabel.js/master/src/Chart.PieceLabel.js"></script>

<script type="text/javascript">
    var $progressValue = 0;
    var resultList=[];
    var questions = {!! $questions->questions !!};

    function shuffle(a) {
        for (var i = a.length; i; i--) {
            var j = Math.floor(Math.random() * i);
            var _ref = [a[j], a[i - 1]];
            a[i - 1] = _ref[0];
            a[j] = _ref[1];
        }
    }

    /*** Return shuffled question ***/

    /*** Return list of options ***/
    function returnOptionList(opts, i){

        var optionHtml='<li class="myoptions">'+
            '<input value="'+opts.id+'" name="optRdBtn" type="radio" id="rd_'+i+'">'+
            '<label for="rd_'+i+'">'+opts.answer+'</label>'+
            '<div class="bullet">'+
            '<div class="line zero"></div>'+
            '<div class="line one"></div>'+
            '<div class="line two"></div>'+
            '<div class="line three"></div>'+
            '<div class="line four"></div>'+
            '<div class="line five"></div>'+
            '<div class="line six"></div>'+
            '<div class="line seven"></div>'+
            '</div>'+
            '</li>';

        return optionHtml;
    }

    /** Render Options **/
    function renderOptions(optionList){
        var ulContainer=$('<ul>').attr('id','optionList');
        for (var i = 0, len = optionList.length; i < len; i++) {
            var optionContainer=returnOptionList(optionList[i], i)
            ulContainer.append(optionContainer);
        }
        $(".answerOptions").html('').append(ulContainer);
    }

    /** Render question **/
    function renderQuestion(question){
        $(".question").html(question.question_text);
    }

    /** Render quiz :: Question and option **/
    function renderQuiz(questions, index){
        var currentQuest=questions[index];
        renderQuestion(currentQuest);
        renderOptions(currentQuest.answers);

    }

    /** Return correct answer of a question ***/
    function getCorrectAnswer(questions, index){
        return questions[index].answers;
    }

    /** pushanswers in array **/
    function correctAnswerArray(resultByCat){
        var arrayForChart=[];
        for(var i=0; i<resultByCat.length;i++){
            arrayForChart.push(resultByCat[i].correctanswer);
        }

        return arrayForChart;
    }
    /** Generate array for percentage calculation **/
    function genResultArray(results, wrong){
        var resultByCat = resultByCategory(results);
        var arrayForChart=correctAnswerArray(resultByCat);
        arrayForChart.push(wrong);
        return arrayForChart
    }

    /** percentage Calculation **/
    function percentCalculation(array, total){
        var percent = array.map(function (d, i) {
            return (100 * d / total).toFixed(2);
        });
        return percent;
    }

    /*** Get percentage for chart **/
    function getPercentage(resultByCat, wrong){
        var totalNumber=resultList.length;
        var wrongAnwer=wrong;
        //var arrayForChart=genResultArray(resultByCat, wrong);
        //return percentCalculation(arrayForChart, totalNumber);
    }

    /** count right and wrong answer number **/
    function countAnswers(results){

        var countCorrect=0, countWrong=0;

        for(var i=0;i<results.length;i++){
            if(results[i].iscorrect==true)
                countCorrect++;
            else countWrong++;
        }

        return [countCorrect, countWrong];
    }

    /**** Categorize result *****/
    function resultByCategory(results){

        var categoryCount = [];
        var ctArray=results.reduce(function (res, value) {
            if (!res[value.category]) {
                res[value.category] = {
                    category: value.category,
                    correctanswer: 0
                };
                categoryCount.push(res[value.category])
            }
            var val=(value.iscorrect==true)?1:0;
            res[value.category].correctanswer += val;
            return res;
        }, {});

        categoryCount.sort(function(a,b) {
            return a.category - b.category;
        });

        return categoryCount;
    }


    /** Total score pie chart**/
    function totalPieChart(_upto, _cir_progress_id, _correct, _incorrect) {

        $("#"+_cir_progress_id).find("._text_incor").html("Incorrect : "+_incorrect);
        $("#"+_cir_progress_id).find("._text_cor").html("Correct : "+_correct);

        var unchnagedPer=_upto;

        _upto = (_upto > 100) ? 100 : ((_upto < 0) ? 0 : _upto);

        var _progress = 0;

        var _cir_progress = $("#"+_cir_progress_id).find("._cir_P_y");
        var _text_percentage = $("#"+_cir_progress_id).find("._cir_Per");

        var _input_percentage;
        var _percentage;

        var _sleep = setInterval(_animateCircle, 25);

        function _animateCircle() {
            //2*pi*r == 753.6 +xxx=764
            _input_percentage = (_upto / 100) * 764;
            _percentage = (_progress / 100) * 764;

            _text_percentage.html(_progress + '%');

            if (_percentage >= _input_percentage) {
                _text_percentage.html('<tspan x="50%" dy="0em">'+unchnagedPer + '% </tspan><tspan  x="50%" dy="1.9em">Your Score</tspan>');
                clearInterval(_sleep);
            } else {

                _progress++;

                _cir_progress.attr("stroke-dasharray",_percentage + ',764');
            }
        }
    }

    function renderBriefChart(correct, total, incorrect){
        var percent=(100 * correct / total);
        if(Math.round(percent) !== percent) {
            percent = percent.toFixed(2);
        }

        totalPieChart(percent, '_cir_progress', correct, incorrect)

    }
    /*** render chart for result **/
    function renderChart(data){
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [ "Verbal communication",
                    "Non-verbal communication",
                    "Written communication",
                    "Incorrect"
                ],
                datasets: [
                    {

                        data: data,
                        backgroundColor: [  '#e6ded4',
                            '#968089',
                            '#e3c3d4',
                            '#ab4e6b'
                        ],
                        borderColor: [  'rgba(239, 239, 81, 1)',
                            '#8e3407',
                            'rgba((239, 239, 81, 1)',
                            '#000000'
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                pieceLabel: {
                    render: 'percentage',
                    fontColor: 'black',
                    precision: 2
                }
            }

        });
    }

    /** List question and your answer and correct answer

     *****/
    function getAllAnswer(results){
        var innerhtml="";
        for(var i=0;i<results.length;i++){

            var _class=((results[i].iscorrect)?"item-correct":"item-incorrect");
            var _classH=((results[i].iscorrect)?"h-correct":"h-incorrect");


            var _html='<div class="_resultboard '+_class+'">'+
                '<div class="_header">'+results[i].question+'</div>'+
                '<div class="_yourans '+_classH+'">'+results[i].clicked+'</div>';

            var html="";
            if(!results[i].iscorrect)
                html='<div class="_correct">'+results[i].answer+'</div>';
            _html=(_html+html)+'</div>';
            innerhtml+=_html;
        }

        $(".allAnswerBox").html('').append(innerhtml);
    }
    /** render  Brief Result **/
    function renderResult(resultList){

        var results=resultList;
        console.log(results);
        var countCorrect=countAnswers(results)[0],
            countWrong=countAnswers(results)[1];


        renderBriefChart(countCorrect, resultList.length, countWrong);
    }

    function renderChartResult(){
        var results=resultList;
        var countCorrect=countAnswers(results)[0],
            countWrong=countAnswers(results)[1];
        var dataForChart=genResultArray(resultList, countWrong);
        renderChart(dataForChart);
    }

    /** Insert progress bar in html **/
    function getProgressindicator(length){
        var progressbarhtml=" ";
        for(var i=0;i<length;i++){
            progressbarhtml+='<a onClick="getQuestionById('+i+');" class="progress_item_'+(i+1)+' progress_items '+((i==0) ? "is-active":" ")+'" href="#"><li>'+(i+1)+'</li></a>';
        }
        $('.progress_menu').append(progressbarhtml);
    }

    /*** change progress bar when next button is clicked ***/
    function changeProgressValue(index){
            index++;
        $progressValue+= 9;
        if ($progressValue >= 100) {
        } else {
            if($progressValue==99) $progressValue=100;

                $('.progress_items').removeClass('is-active');
                $('.progress_item_'+index).addClass('is-active');

            $('progress').val($progressValue);
        }
        $('.js-my-progress-completion').html($('progress').val() + '% complete');
    }

    function addClickedAnswerToResult(questions,presentIndex,clicked ){
        var correct=getCorrectAnswer(questions, presentIndex);
        var result={
            index:presentIndex,
            question:questions[presentIndex].question,
            clicked:clicked,
            iscorrect:(clicked==correct)?true:false,
            answer:correct,
            category:questions[presentIndex].category
        }
        resultList.push(result);

        console.log("result");
        console.log(result);

    }

    function tick() {
        var e = document.getElementById("time-display"),
            t = Math.floor(secondsRemaining / 60),
            n = secondsRemaining - 60 * t;
        10 > t && (t = "0" + t), 10 > n && (n = "0" + n);
        var a = t + ":" + n;
        (e.innerHTML = a), 0 === secondsRemaining &&
        (clearInterval(timerInterval), startBreak()), secondsRemaining--;
    }

    function startTimer() {
        var e = {!! $questions->duration !!};
        return (secondsRemaining = 60 * e), 0 > secondsRemaining ||
        isNaN(e) ||
        "" === e
            ? (
                (document.getElementById("minutes").value = ""),
                    (document.getElementById("time-display").innerHTML = "00:00"),
                    void clearInterval(timerInterval)
            )
            : (
                clearInterval(timerInterval),
                    void (timerInterval = setInterval(tick, 1e3))
            );
    }

    var secondsRemaining,
        timerInterval,
        stateSetting,
        paused = !1;
    window.onload = function() {
        startTimer();
    };

    $(document).ready(function() {

        var presentIndex=0;
        var clicked=0;

        renderQuiz(questions, presentIndex);
        getProgressindicator(questions.length);

        $(".answerOptions ").on('click','.myoptions>input', function(e){
            clicked=$(this).val();
            if(presentIndex==0){
                $("#previous").addClass("hidden");
            }
            if(questions.length==(presentIndex+1)){
                $("#submit").removeClass('hidden');
            }
            else{
                $("#next").removeClass("hidden");
            }
        });

        $("#next").on('click',function(e){
            e.preventDefault();
            addClickedAnswerToResult(questions,presentIndex,clicked);
            presentIndex++;
            $("#previous").removeClass("hidden");
            renderQuiz(questions, presentIndex);
            changeProgressValue(presentIndex);
        });

        $("#previous").on('click',function(e){
            e.preventDefault();
            addClickedAnswerToResult(questions,presentIndex,clicked);
            presentIndex--;
            if(presentIndex==0){
                $(this).addClass("hidden");
            }
            renderQuiz(questions, presentIndex);
            changeProgressValue( presentIndex);
        });

        $("#submit").on('click',function(e){
            addClickedAnswerToResult(questions,presentIndex,clicked);
            $('.multipleChoiceQues').hide();
            $(".resultArea").show();
            renderResult(resultList);

        });

        $(".resultArea").on('click','.viewchart',function(){
            $(".resultPage2").show();
            $(".resultPage1").hide();
            $(".resultPage3").hide();
            renderChartResult();
        });

        $(".resultArea").on('click','.backBtn',function(){
            $(".resultPage1").show();
            $(".resultPage2").hide();
            $(".resultPage3").hide();
            renderResult(resultList);
        });

        $(".resultArea").on('click','.viewanswer',function(){
            $(".resultPage3").show();
            $(".resultPage2").hide();
            $(".resultPage1").hide();
            getAllAnswer(resultList);
        });

        $(".resultArea").on('click','.replay',function(){
            window.location.reload(true);
        });

        getQuestionById = function(id){
            addClickedAnswerToResult(questions,presentIndex,clicked);
            presentIndex = id;
            renderQuiz(questions, presentIndex);
            changeProgressValue( presentIndex);
        }

    });
</script>



</body>
</html>






