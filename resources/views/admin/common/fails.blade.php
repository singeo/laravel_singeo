<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>提示</title>
    <!-- bootstrap.min.css -->
    <link href="{{ asset('/static/admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- 字体图标 -->
    <link href="{{ asset('/static/admin/plugins/fontawesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        .wrapper{
            width: 900px;
            margin:100px auto 0;
            padding-bottom: 50px;
            border-style:dashed;
            border-color:#e4e4e4;
            line-height:30px;
        }
        @media screen and (max-width: 900px) {
            .wrapper{
                width: 100% ;
                border: none ;
            }
        }
        .color-red{
            color: red ;
        }
        .f-sz-tip{
            font-size: 10em;
        }
    </style>
</head>
<body>
<div class="wrapper text-center">
    <div>
        <span class="fa fa-close color-red f-sz-tip"></span>
    </div>
    @foreach($errors->all() as $error)
    <h2 style="margin-top: 15px;">{{ $error }}</h2>
    @endforeach
    <div style="margin-top: 15px;">页面自动 <a id="href" href="{{ session('redirct_url') }}">跳转</a> 等待时间： <b id="wait">3</b></div>
    <div style="margin-top: 15px;">
        <a class="btn btn-primary" href="{{ asset('/') }}" title="返回后台首页" target="_blank">返回后台首页</a>
    </div>
</div>
<script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),
            href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);
    })();
</script>
</body>
</html>
