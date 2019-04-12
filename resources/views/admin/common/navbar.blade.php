<div class="navbar">
    <div class="navbar-inner">
        <div class="sidebar-pusher">
            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="logo-box">
            <a href="{{ url('/index') }}" class="logo-text"><span>Singeo</span></a>
        </div><!-- Logo Box -->
        <div class="topmenu-outer">
            <div class="top-menu">
                <ul  id = " tag_a" class="nav navbar-nav navbar-left">
                    <li>
                        <a href="javascript:void(0);"
                           class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                    </li>
                    <li>
                        <a href="#cd-nav" class="waves-effect waves-button waves-classic cd-nav-trigger"><i
                                class="fa fa-diamond"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"
                           class="waves-effect waves-button waves-classic toggle-fullscreen"><i
                                class="fa fa-expand"></i></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                            <span class="user-name">{{ $user->user_nickname }}<i class="fa fa-angle-down"></i></span>
                            <img class="img-circle avatar" src="{{ $user->avatar }}" width="40" height="40"alt="">
                        </a>
                        <ul class="dropdown-menu dropdown-list" role="menu">
                            <li role="presentation"><a href="http://dev.singeo.com" target="_blank"><i class="fa fa-home"></i>网站首页</a></li>
                            <li role="presentation"><a href="/admin/Index/authclear"><i class="fa fa-eraser"></i>清除网站缓存</a></li>
                            <!--<li role="presentation"><a href="/admin/Index/siteMap"><i class="fa fa-sitemap"></i>生成网站地图</a></li>-->
                            <li role="presentation"><a href="javascript:editPassword()"><i class="fa fa-user"></i>修改密码</a></li>
                            <li role="presentation"><a href="{{ url('/logout') }}"><i class="fa fa-sign-out m-r-xs"></i>退出</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/admin/Login/logout.html" class="log-out waves-effect waves-button waves-classic">
                            <span><i class="fa fa-sign-out m-r-xs"></i>安全退出</span>
                        </a>
                    </li>
                </ul><!-- Nav -->
            </div><!-- Top Menu -->
        </div>
    </div>
</div>