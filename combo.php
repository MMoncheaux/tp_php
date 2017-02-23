<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>osef</title>
    <style>
        body{
            background-color: #000;
            padding: 50px;
        }
        .combo{
            width:60%;
            color:#fff;
            background-color: #000;
            height: 34px;
            border:1px #eee solid;
            line-height: 34px;
            border-radius: 2px;

        }
        span{
            height: 100%;
            margin: 0;
            padding: 0;
            float: left;
            box-sizing: border-box;
        }
        .text{
            width:calc(100% - 40px);
            padding:0 2%;
        }
        .fleche{
            width: 40px;
            text-align: center;
            border-left:2px #eee solid;
            z-index:5;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="combo">
        <span class="text">aezre</span>
        <span class="fleche">\/</span>
    </div>
</body>
</html>