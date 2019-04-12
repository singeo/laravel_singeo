@extends('admin.common.layout')
@section('web_title','后台管理系统')
@section('main')
<div class="page-title">
    <h3>欢迎进入singeo后台管理系统</h3>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title txt-dark">快捷方式</h6>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="shortcut col-sm-6">
                                <a href="/admin/Article/index">
                                    <i class="fa fa-archive text-lg"></i>
                                    <span>文章管理</span>
                                </a>
                            </div>
                            <div class="shortcut col-sm-6">
                                <a href="/admin/Arctype/index">
                                    <i class="fa fa-columns text-lg"></i>
                                    <span>栏目管理</span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="shortcut col-sm-6">
                                <a href="/admin/Webconfig/index">
                                    <i class="fa fa-columns text-lg"></i>
                                    <span>网站配置</span>
                                </a>
                            </div>
                            <div class="shortcut col-sm-6">
                                <a href="/admin/Index/authclear">
                                    <i class="fa fa-eraser text-lg"></i>
                                    <span>清除网站缓存</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title txt-dark">数据统计</h6>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="admin-census col-sm-6">
                                <a href="">
                                    <h2>文章</h2>
                                    <span>22</span>
                                </a>
                            </div>
                            <div class="admin-census col-sm-6">
                                <a href="">
                                    <h2>栏目</h2>
                                    <span>22</span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="admin-census col-sm-6">
                                <a href="">
                                    <h2>留言</h2>
                                    <span>22</span>
                                </a>
                            </div>
                            <div class="admin-census col-sm-6">
                                <a href="">
                                    <h2>产品</h2>
                                    <span>22</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title txt-dark">管理员信息</h6>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-3">First Name:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> John </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title txt-dark">系统信息</h6>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        aaa
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection