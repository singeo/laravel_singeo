@extends('admin.common.layout')
@section('web_title','后台管理系统')
@section('main')
    <div class="page-title">
        <h3>角色管理</h3>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="panel panel-body panel-white">
                <button type="button" class="btn btn-success m-b-sm" onclick="roleAdd();">新增角色</button>
                <div class="table-responsive">
                    <div class="dataTables_wrapper">
                        <table id="roleTables" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                            <tr>
                                <th>角色名称</th>
                                <th>状态</th>
                                <th>排序</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roleList as $item)
                                <tr>
                                    <td>{{ $item->role_name }}</td>
                                    <td>@if($item->status == 1) 正常
                                        @elseif($item->status == -1)<span class="text-danger">禁用</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->sort }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" onclick="roleEdit({{ $item->id }});">修改</button>
                                        <button type="button" class="btn btn-warning" onclick="userRole({{ $item->id }});">授权</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $roleList->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('/static/admin/plugins/datatables/js/jquery.datatables.min.js') }}"></script>
<script src="{{ asset('/static/admin/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js') }}"></script>
<script type="text/javascript">
    $(function(){
        $('#roleTables').DataTable({
            paging: false,
            info: false,
            ordering:false,
            searching:false,
            language:lang
        });
    });
    //新增角色
    function roleAdd(){
        var baseurl = '{{ url('/consolerole/create') }}' ;
        $.myModal.open({
            remote:baseurl,
            backdrop: 'static',
            keyboard: false,
            show:true,
            success:function(o){
                initValid();
            }
        }) ;
    }

    //修改角色
    function roleEdit(id){
        var baseurl = '{{ url('/consolerole/edit') }}' ;
        baseurl = baseurl + '/' + id ;
        $.myModal.open({
            remote:baseurl,
            backdrop: 'static',
            keyboard: false,
            show:true,
            success:function(o){
                initValid();
            }
        }) ;
    }

    //删除节点
    function nodeDel(id){
        var baseurl = '{{ url('/consolenode/delete') }}' ;
        baseurl = baseurl + '/' + id ;
        $.myModal.open({
            remote:baseurl,
            backdrop: 'static',
            keyboard: false,
            show:true,
            success:function(o){
            }
        }) ;
    }
</script>
@endsection