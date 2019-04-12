<!-- Javascripts -->
<script src="/static/admin/plugins/3d-bold-navigation/js/modernizr.js"></script>
<script src="/static/admin/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="/static/admin/js/html5shiv.min.js"></script>
<script src="/static/admin/js/respond.min.js"></script>
<![endif]-->

<script src="/static/admin/plugins/jquery/jquery-2.1.3.min.js"></script>
<script src="/static/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/static/admin/plugins/pace-master/pace.min.js"></script>
<script src="/static/admin/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="/static/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/static/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/static/admin/plugins/offcanvasmenueffects/js/classie.js"></script>
<script src="/static/admin/plugins/offcanvasmenueffects/js/main.js"></script>
<script src="/static/admin/plugins/waves/waves.min.js"></script>
<script src="/static/admin/plugins/3d-bold-navigation/js/main.js"></script>
<script src="/static/admin/plugins/metrojs/MetroJs.min.js"></script>
<script src="/static/admin/plugins/validform/validform.min.js"></script>
<script src="/static/admin/js/modal.ext.js"></script>
<script src="/static/admin/js/custom.js"></script>
<script src="/static/admin/js/modern.min.js"></script>

<script type="text/javascript">
    // 当前操作完整路径
    var _CURACTION = '/admin/Index/index' ;
    $(function() {
        //导航栏展开
        $('#menu a').each(function () {
            if ($(this).attr('href') == _CURACTION) {
                $(this).parent('li').addClass('active');
                $(this).parents('li.droplink').addClass('open').children('ul').show();
            }
        });
    });
</script>