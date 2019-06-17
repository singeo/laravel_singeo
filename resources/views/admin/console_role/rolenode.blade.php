<form class="form-horizontal" name="admin_group_form" action="{{ url('/consolerole/role_access',$consoleRole->id) }}" method="post">
    <div class="modal-body" style="width:800px;height:550px;overflow-x: hidden;overflow-y:auto; ">
        @foreach($nodeList as $node)
        <dl class="checkmod">
            <dt class="hd">
                <label class="checkbox"><input class="auth_rules rules_all" type="checkbox" name="rules[]" value="{{ $node->id }}" @if($myNodes->contains($node)) checked @endif>{{ $node->node_name }}</label>
            </dt>
            @if($node->_data->isNotEmpty())
            @foreach($node->_data as $node_son)
            <dd class="bd">
                <div class="rule_check">
                    <div>
                        <label class="checkbox">
                            <input class="auth_rules rules_row" type="checkbox" name="rules[]" value="{{ $node_son->id }}" @if($myNodes->contains($node_son)) checked @endif>{{ $node_son->node_name }}
                        </label>
                    </div>
                    @if($node_son->_data->isNotEmpty())
                    <span class="divsion">&nbsp;</span>
                    <span class="child_row">
                        @foreach($node_son->_data as $node_act)
                            <label class="checkbox">
                                <input class="auth_rules" type="checkbox" name="rules[]" value="{{ $node_act->id }}" @if($myNodes->contains($node_act)) checked @endif>{{ $node_act->node_name }}
                            </label>
                        @endforeach
                    </span>
                    @endif
                </div>
            </dd>
            @endforeach
            @endif
        </dl>
        @endforeach
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="submit" id="add-row" class="btn btn-success">确定授权</button>
    </div>
    {{ csrf_field() }}
</form>

<script type="text/javascript">
    function initCheck(){
        var rules = [];
        $('.auth_rules').each(function(){
            if( $.inArray( parseInt(this.value,10),rules )>-1 ){
                $(this).prop('checked',true);
            }
            if(this.value==''){
                $(this).closest('span').remove();
            }
        });
        //全选节点
        $('.rules_all').on('change',function(){
            $(this).closest('dl').find('dd').find('input').prop('checked',this.checked);
        });
        $('.rules_row').on('change',function(){
            $(this).closest('.rule_check').find('.child_row').find('input').prop('checked',this.checked);
        });

    }
</script>