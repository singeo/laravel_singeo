<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    <h4 class="modal-title" id="myModalLabel">修改角色</h4>
</div>
<form class="form-horizontal" name="roleForm" method="post" action="{{ url('/consolerole/save') }}">
    <div class="modal-body">
        <div class="form-group">
            <label for="role_name" class="col-sm-2 control-label">角色名称</label>
            <div class="col-sm-8">
                <input type="text" id="role_name" name="role_name" value="{{ $consoleRole->role_name }}" class="form-control" datatype="s2-20" nullmsg="请输入角色名称" errormsg="角色名称为2-20位字符串" sucmsg=" " placeholder="请输入角色名称" maxlength="20">
                <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label for="sort" class="col-sm-2 control-label">排序</label>
            <div class="col-sm-8">
                <input type="text" id="sort" name="sort" value="{{ $consoleRole->sort }}" class="form-control" value="50">
                <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">状态</label>
            <div class="col-sm-8">
                <label class="checkbox-inline">
                    <input type="radio" name="status" value="1" @if($consoleRole->status == 1)checked @endif>&nbsp;正常
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="status" value="-1" @if($consoleRole->status == -1)checked @endif>&nbsp;禁用
                </label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="submit" id="add-row" class="btn btn-success">保存</button>
    </div>
    <input type="hidden" name="role_id" value="{{ $consoleRole->id }}"/>
    {{ method_field('put') }}
    {{ csrf_field() }}
</form>
<script type="text/javascript">
    function initValid(){
        $("form[name='roleForm']").Validform({
            tiptype: 3,
            ajaxPost: false,
            postonce: false,
            callback: function(data){
                return true ;
            }
        });
    }
</script>