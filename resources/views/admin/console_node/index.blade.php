@extends('admin.common.layout')
@section('web_title','后台管理系统')
@section('main')
    <div class="page-title">
        <h3>后台节点管理</h3>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="panel panel-body panel-white">
                <button type="button" class="btn btn-success m-b-sm" onclick="nodeAdd('');">新增节点</button>
                <div class="table-responsive">
                    <div class="dataTables_wrapper">
                        <table id="nodeTables" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                            <tr>
                                <!--<th>&emsp;折叠</th>-->
                                <th>节点名称</th>
                                <th>路由地址</th>
                                <th>类型</th>
                                <th>排序</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($resultList as $item)
                            <tr data-id="{{ $item['id'] }}" data-pid="{{ $item['pid'] }}" @if($item['_level'] != 1)class="hide"@endif>
                                <td>{{ str_repeat('&emsp;',$item['_level']) }}
                                    @if($item['_child']) <span class="fold f-s-14 fa fa-plus-square-o"></span>
                                    @else <span class="fold f-s-14 fa fa-minus-square-o"></span>
                                    @endif {{ $item['node_name'] }}
                                </td>
                                <td>{{ $item['node_url'] }}</td>
                                <td>@if($item['type'] == 1)菜单 @else 操作 @endif</td>
                                <td>{{ $item['sort'] }}</td>
                                <td>@if($item['status'] == 1)
                                    正常
                                    @elseif($item['status'] == -1)<span class="text-danger">禁用</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success" onclick="nodeAdd({{ $item['id'] }})">添加子节点</button>
                                    <button type="button" class="btn btn-info" onclick="nodeEdit({{ $item['id'] }});">修改</button>
                                    <button type="button" class="btn btn-default" onclick="nodeDel({{ $item['id'] }});">删除</button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
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
    $('#nodeTables').DataTable({
        paging: false,
        info: false,
        ordering:false,
        searching:false,
        language:lang
    });
    //折叠器,显示隐藏
    $('#nodeTables').on('click','.fold',function(){
        var theTrObj = $(this).parents('tr') ;
        var foldpid = theTrObj.attr('data-id') ;
        if($(this).hasClass('fa-plus-square-o')){
            theTrObj.siblings('tr[data-pid="'+ foldpid +'"]').removeClass('hide') ;
            $(this).removeClass('fa-plus-square-o').addClass('fa-minus-square-o') ;
        }else{
            if($('tr[data-pid="'+ foldpid +'"]').length > 0){
                theTrObj.siblings('tr[data-pid="'+ foldpid +'"]').addClass('hide') ;
                $(this).removeClass('fa-minus-square-o').addClass('fa-plus-square-o') ;
            }
        }
    });
});
//新增节点
function nodeAdd(id){
    var baseurl = '{{ url('/consolenode/create') }}' ;
    baseurl = id == '' ? baseurl : baseurl + '/' + id ;
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

//修改节点
function nodeEdit(id){
    var baseurl = '{{ url('/consolenode/edit') }}' ;
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