<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        a{
            text-decoration: none;
        }

        p, li, a{
            font-size: 14px;
        }
        .pagination{
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

        .p12 a:first-of-type, .p12 a:last-of-type, .p12 .is-active{
            background-color: #2ecc71;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="row justify-content-between">
    <div class="mainPart col-md-12" >
        <div class="container">
        <div class="pagination p12">
            <ul>
                <a href="#"><li>Previous</li></a>
                <a href="#"><li>1</li></a>
                <a href="#"><li>2</li></a>
                <a href="#"><li>3</li></a>
                <a href="#"><li>4</li></a>
                <a href="#"><li>5</li></a>
                <a class="is-active" href="#"><li>6</li></a>
                <a href="#"><li>Next</li></a>
            </ul>
        </div>
        </div>
    </div>
</div>
</div>
</body>
</html>






