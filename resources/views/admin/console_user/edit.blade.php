<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    <h4 class="modal-title" id="myModalLabel">修改管理员</h4>
</div>
<form class="form-horizontal" name="userForm" method="post" action="{{ url('/consoleuser/save') }}">
    <div class="modal-body">
        <div class="form-group">
            <label for="user_login" class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-8">
                <input type="text" id="user_login" name="user_login" value="{{ $consoleUser->user_login }}" class="form-control" datatype="s2-20" nullmsg="请输入管理员用户名" errormsg="管理员用户名为2-20位字符串" sucmsg=" " placeholder="请输入管理员用户名" maxlength="20">
                <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label for="user_nickname" class="col-sm-2 control-label">用户昵称</label>
            <div class="col-sm-8">
                <input type="text" id="user_nickname" name="user_nickname" value="{{ $consoleUser->user_nickname }}" class="form-control" datatype="s2-20" nullmsg="请输入用户昵称" errormsg="用户昵称为2-20位字符串" sucmsg=" " placeholder="请输入用户昵称" maxlength="20">
                <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">电子邮箱</label>
            <div class="col-sm-8">
                <input type="text" id="email" name="email" value="{{ $consoleUser->user_email }}" class="form-control" datatype="e" ignore="ignore" errormsg="电子邮箱格式错误" sucmsg=" " placeholder="请输入电子邮箱">
                <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label for="mobile" class="col-sm-2 control-label">联系手机</label>
            <div class="col-sm-8">
                <input type="text" id="mobile" name="mobile" value="{{ $consoleUser->mobile }}" class="form-control" datatype="m" ignore="ignore" errormsg="联系手机格式错误" sucmsg=" " placeholder="请输入联系手机" maxlength="11">
                <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label for="user_pass" class="col-sm-2 control-label">修改密码</label>
            <div class="col-sm-8">
                <input type="text" id="user_pass" name="user_pass" class="form-control" datatype="s6-24" ignore="ignore" nullmsg="请输入用户初始密码" errormsg="用户密码为6-24位字符串" sucmsg=" " placeholder="请输入用户初始密码" maxlength="24">
                <span class="Validform_checktip">为空则不进行修改密码，不为空将修改原始密码</span></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">状态</label>
            <div class="col-sm-8">
                <label class="checkbox-inline">
                    <input type="radio" name="user_status" value="1" @if($consoleUser->user_status == 1)checked @endif>&nbsp;正常
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="user_status" value="-1" @if($consoleUser->user_status == -1)checked @endif>&nbsp;禁用
                </label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="submit" id="add-row" class="btn btn-success">保存</button>
    </div>
    <input type="hidden" name="user_id" value="{{ $consoleUser->id }}" />
    {{ method_field('put') }}
    {{ csrf_field() }}
</form>
<script type="text/javascript">
    function initValid(){
        $("form[name='userForm']").Validform({
            tiptype: 3,
            ajaxPost: false,
            postonce: false,
            callback: function(data){
                return true ;
            }
        });
    }
</script>