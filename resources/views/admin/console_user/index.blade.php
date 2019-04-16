@extends('admin.common.layout')
@section('web_title','后台管理系统')
@section('main')
    <div class="page-title">
        <h3>管理员管理</h3>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="panel panel-body panel-white">
                <button type="button" class="btn btn-success m-b-sm" onclick="userAdd();">新增管理员</button>
                <div class="table-responsive">
                    <div class="dataTables_wrapper">
                        <table id="userTables" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                            <tr>
                                <th>用户名</th>
                                <th>用户昵称</th>
                                <th>电子邮箱</th>
                                <th>联系手机</th>
                                <th>登录次数</th>
                                <th>最后一次登录时间</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userList as $item)
                            <tr>
                                <td>{{ $item->user_login }}</td>
                                <td>{{ $item->user_nickname }}</td>
                                <td>{{ $item->user_email }}</td>
                                <td>{{ $item->mobile }}</td>
                                <td>{{ $item->login_times }}</td>
                                <td>{{ $item->last_login_time }}</td>
                                <td>@if($item->user_status == 1) 正常
                                    @elseif($item->user_status == -1)<span class="text-danger">禁用</span>
                                    @endif</td>
                                <td>
                                    <button type="button" class="btn btn-info" onclick="userEdit({{ $item->id }});">修改</button>
                                    <button type="button" class="btn btn-warning" onclick="userRole({{ $item->id }});">授权</button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $userList->render() }}
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
        $('#userTables').DataTable({
            paging: false,
            info: false,
            ordering:false,
            searching:false,
            language:lang
        });
    });
    //新增管理员
    function userAdd(){
        var baseurl = '{{ url('/consoleuser/create') }}' ;
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

    //修改管理员
    function userEdit(id){
        var baseurl = '{{ url('/consoleuser/edit') }}' ;
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