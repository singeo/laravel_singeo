<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">新增节点</h4>
</div>
<form class="form-horizontal" name="nodeForm" method="post" action="{{ url('/consolenode/store') }}">
    <div class="modal-body">
        <div class="form-group">
            <label for="node_name" class="col-sm-2 control-label">节点名称</label>
            <div class="col-sm-8">
                <input type="text" id="node_name" name="node_name" class="form-control" dataType="s2-20" nullmsg="请输入节点名称" errormsg="节点名称为2-20位字符串" sucmsg=" " placeholder="请输入节点名称" maxlength="20"/>
            </div>
        </div>
        <div class="form-group">
            <label for="pid" class="col-sm-2 control-label">父节点</label>
            <div class="col-sm-8">
                <select class="form-control" id="pid" name="pid">
                    <option value="0">顶级节点</option>
                    @foreach($resultList as $item)
                    <option value="{{ $item['id']}}" @if($item['id'] == $currNodeId)selected @endif>{{ $item['_name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="node_url" class="col-sm-2 control-label">路由地址</label>
            <div class="col-sm-8">
                <input type="text" id="node_url" name="node_url" class="form-control" dataType="*" nullmsg="请输入路由地址" errormsg="请输入路由地址" sucmsg=" " placeholder="请输入路由地址">
            </div>
        </div>
        <div class="form-group">
            <label for="type" class="col-sm-2 control-label">类型</label>
            <div class="col-sm-8">
                <select id="type" name="type" class="col-xs-10 col-sm-6 form-control" >
                    <option value="1">菜单</option>
                    <option value="2">操作</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="node_icon" class="col-sm-2 control-label">图标</label>
            <div class="col-sm-8">
                <input type="text" id="node_icon" name="node_icon" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="sort" class="col-sm-2 control-label">排序</label>
            <div class="col-sm-8">
                <input type="text" name="sort" id="sort" class="form-control" value="50"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">状态</label>
            <div class="col-sm-8">
                <label class="checkbox-inline">
                    <input type="radio" name="status" value="1" checked>&nbsp;正常
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="status" value="-1">&nbsp;禁用
                </label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="submit" id="add-row" class="btn btn-success">新增</button>
    </div>
    {{ csrf_field() }}
</form>
<script type="text/javascript">
    function initValid(){
        $("form[name='nodeForm']").Validform({
            tiptype: 3,
            ajaxPost: false,
            postonce: false,
            callback: function(data){
                return true ;
            }
        });
    }
</script>
