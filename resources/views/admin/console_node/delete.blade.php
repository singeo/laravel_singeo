<form class="form-horizontal" name="ruleForm" method="post" action="{{ url('/consolenode/submitdelete') }}">

    <div class="modal-body">
        确认要删除<span class="f-red">{{ $consoleNode->node_name }}</span>吗?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="submit" id="add-row" class="btn btn-success">确认</button>
    </div>
    <input type="hidden" name="node_id" value="{{ $consoleNode->id }}">
    {{ csrf_field() }}
    {{ method_field('delete') }}
</form>