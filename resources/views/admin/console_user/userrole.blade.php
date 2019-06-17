<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">分配用户角色</h4>
</div>
<form class="form-horizontal" name="admin_group_form" action="{{ url('consoleuser/saveRoles',$consoleUser->id) }}" method="post">
    <div class="modal-body">
        <dl class="checkmod">
            <dd class="bd">
                @foreach($roles as $role)
                <label class="checkbox">
                    <input name="role_id[]" type="checkbox" value="{{ $role->id }}" @if($curRoles->contains($role))checked @endif>&nbsp;{{ $role->role_name }}
                </label>
                @endforeach
            </dd>
        </dl>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="submit" id="add-row" class="btn btn-success">确定分配</button>
    </div>
    {{ csrf_field() }}
</form>