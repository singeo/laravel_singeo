

<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <!-- Title -->
    <title>Singeo后台管理系统</title>
    <meta name="description" content="后台管理系统"/>
    <meta name="keywords" content="后台管理系统"/>
    <meta name="author" content="singeo"/>
    <!-- Styles -->
    <!-- google字体 -->
    <link href="{{ asset('/static/admin/plugins/googleapis-fonts/fonts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/static/admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Theme Styles -->
    <link href="{{ asset('/static/admin/css/modern.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/static/admin/css/themes/white.css') }}" class="theme-color" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/static/admin/css/custom.css') }}" rel="stylesheet" type="text/css"/>
    <!-- 表单验证插件 -->
    <link href="{{ asset('/static/admin/plugins/validform/validform.css') }}" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        .verify-code-img{
            width:100%;
            height:60px;
        }
    </style>
</head>
<body class="page-login">
<main class="page-content">
    <div class="page-inner">
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-3 center">
                    <div class="login-box">
                        <a href="javascript:void(0);" class="logo-name text-lg text-center">singeo - 后台管理</a>
                        <p class="text-center m-t-md">请登录您的账户</p>
                        <form class="m-t-md" name="login_form" method="post" action="{{url('/login')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input name="user_login" class="form-control" value="{{ old('user_login') }}" dataType="s" nullmsg="请输入登录账号" errormsg="账户为2-20位字符串" sucmsg=" " placeholder="请输入登录账号" maxlength="20">
                            </div>
                            <div class="form-group">
                                <input name="user_pass" type="password" class="form-control" dataType="s6-24" nullmsg="请输入登录密码" errormsg="登录密码为6-24位字符串" sucmsg=" " placeholder="请输入登录密码" maxlength="24">
                            </div>
                            <div class="form-group">
                                <input name="verify_code" type="text" class="form-control" dataType="s" nullmsg="请输入图片验证码" errormsg="验证码格式错误" sucmsg=" " placeholder="请输入图片验证码" maxlength="5">
                            </div>
                            <div class="form-group">
                                <img src="{{url('/verify')}}" class="verify-code-img" onclick="this.src = '{{url('/verify')}}?'+ Math.random()">
                            </div>
                            <button type="submit" class="btn btn-success btn-block">登录</button>
                        </form>
                        <p class="text-center m-t-xs text-sm">2019 &copy; www.singeo.cn</p>
                    </div>
                </div>
            </div><!-- Row -->
        </div><!-- Main Wrapper -->
    </div><!-- Page Inner -->
</main><!-- Page Content -->
<script src="{{ asset('/static/admin/plugins/jquery/jquery-2.1.3.min.js') }}"></script>
<script src="{{ asset('/static/admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/static/admin/plugins/validform/validform.min.js') }}"></script>
<script src="{{ asset('/static/admin/js/modal.ext.js') }}"></script>
@if(count($errors) > 0)
@include('admin.common.error')
@endif
<script type="text/javascript">
    $(function(){
        $("form[name='login_form']").Validform({
            tiptype: 3,
            ajaxPost: false,
            postonce: false,
            callback: function(data){
                //执行登录
                return true ;
            }
        });
    });
</script>
</body>
</html>