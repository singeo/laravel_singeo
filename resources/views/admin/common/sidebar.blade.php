<div class="page-sidebar sidebar compact-menu">
    <div class="page-sidebar-inner slimscroll">
        <div class="sidebar-header">
            <div class="sidebar-profile">
                <a href="javascript:void(0);" id="profile-menu-link">
                    <div class="sidebar-profile-image">
                        <img src="{{ $user->avatar }}" class="img-circle img-responsive" alt="">
                    </div>
                    <div class="sidebar-profile-details">
                        <span>{{ $user->user_nickname }}</span>
                    </div>
                </a>
            </div>
        </div>
        <ul id="menu" class="menu accordion-menu">
            <li class="droplink">
                <a class="waves-effect waves-button" href="/admin/Portal/">
                    <span class="menu-icon glyphicon glyphicon-th"></span>
                    <p>内容管理</p>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="/admin/Arctype/index">
                            <p>栏目管理</p>
                        </a>
                    </li>
                    <li >
                        <a href="/admin/ChannelType/index">
                            <p>模型管理</p>
                        </a>
                    </li>
                    <li >
                        <a href="/admin/Article/index">
                            <p>文章列表</p>
                        </a>
                    </li>
                    <li >
                        <a href="/admin/SinglePage/index">
                            <p>单页管理</p>
                        </a>
                    </li>
                    <li class="droplink">
                        <a href="/admin/Advert/">
                            <p>广告管理</p>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="/admin/AdvertCategory/index">
                                    广告分类                            </a>
                            </li>
                            <li>
                                <a href="/admin/Advert/index">
                                    广告列表                            </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="droplink">
                <a class="waves-effect waves-button" href="/admin/extend">
                    <span class="menu-icon glyphicon glyphicon-hourglass"></span>
                    <p>扩展管理</p>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="/admin/Author/index">
                            <p>作者管理</p>
                        </a>
                    </li>
                    <li >
                        <a href="/admin/Source/index">
                            <p>文章来源</p>
                        </a>
                    </li>
                    <li >
                        <a href="/admin/Tags/index">
                            <p>标签管理</p>
                        </a>
                    </li>
                    <li class="droplink">
                        <a href="/admin/Datas/">
                            <p>数据库</p>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="/admin/Datas/index">
                                    数据备份                            </a>
                            </li>
                            <li>
                                <a href="/admin/Datas/restore">
                                    数据还原                            </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="droplink">
                <a class="waves-effect waves-button" href="/admin/Consoleconfig/">
                    <span class="menu-icon glyphicon glyphicon-cog"></span>
                    <p>系统配置</p>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="/admin/Webconfig/index">
                            <p>网站设置</p>
                        </a>
                    </li>
                    <li >
                        <a href="/admin/Consolemenu/index">
                            <p>后台菜单管理</p>
                        </a>
                    </li>
                    <li >
                        <a href="/admin/Consolerole/index">
                            <p>角色管理</p>
                        </a>
                    </li>
                    <li >
                        <a href="/admin/Consoleuser/index">
                            <p>管理员管理</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div><!-- Page Sidebar Inner -->
</div><!-- Page Sidebar -->