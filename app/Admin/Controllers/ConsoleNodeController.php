<?php
/**
 * 后台菜单管理
 * User: singeo
 * Date: 2019/4/15 0015
 * Time: 上午 9:53
 */

namespace App\Admin\Controllers;


use App\Admin\Models\ConsoleNode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsoleNodeController extends Controller
{
    /**
     * 菜单列表
     */
    public function index()
    {
        $nodeList = ConsoleNode::orderBy('sort','asc')
            ->orderBy('id','desc')
            ->get() ;
        $resultList = \App\Admin\Librarys\TreeShape::tree($nodeList,'node_name','id', 'pid') ;
        dd($resultList) ;
        return view('admin.console_node.index',compact('resultList')) ;
    }

    /**
     * 新增菜单
     */
    public function create(ConsoleNode $consoleNode)
    {
        $resultList = ConsoleNode::getNodeTree() ;
        $currNodeId = empty($consoleNode->id) ? '' : $consoleNode->id ;
        return view('admin.console_node.create',compact('resultList','currNodeId')) ;
    }

    /**
     * 新增菜单提交
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'node_name'=>'required|max:20|min:2',
            'node_url'=>'required',
        ]) ;
        if($validator->passes()){
            $nodemodel = new ConsoleNode() ;
            $nodemodel->node_name = $request->input('node_name') ;
            $nodemodel->pid = $request->input('pid') ;
            $nodemodel->type = $request->input('type') ;
            $nodemodel->node_url = $request->input('node_url') ;
            $nodemodel->node_icon = $request->input('node_icon') ;
            $nodemodel->sort = $request->input('sort') ;
            $nodemodel->status = $request->input('status') ;
            $result = $nodemodel->save() ;
            if(!$result){
                return redirect('fails')
                    ->withErrors('数据保存失败')
                    ->with('redirct_url','/consolenode/index') ;
            }else{
                return redirect('/consolenode/index') ;
            }
        }else{
            return redirect('fails')
                ->withErrors($validator)
                ->with('redirct_url','/consolenode/index') ;
        }
    }

    /**
     * 修改菜单
     */
    public function edit(ConsoleNode $consoleNode)
    {
        $resultList = ConsoleNode::getNodeTree() ;
        return view('admin.console_node.edit',compact('consoleNode','resultList')) ;
    }

    /**
     * 修改菜单提交
     */
    public function save(Request $request){
        $validator = Validator::make($request->all(),[
            'node_name'=>'required|max:20|min:2',
            'node_url'=>'required',
            'node_id'=>'required|integer'
        ]) ;

        if($validator->passes()){
            $node_id = $request->input('node_id') ;
            $nodes = ConsoleNode::find($node_id) ;
            $nodes->node_name = $request->input('node_name') ;
            $nodes->pid = $request->input('pid') ;
            $nodes->node_url = $request->input('node_url') ;
            $nodes->node_icon = $request->input('node_icon') ;
            $nodes->sort = $request->input('sort') ;
            $nodes->status = $request->input('status') ;
            $result = $nodes->save() ;
            if(!$result){
                return redirect('fails')
                    ->withErrors('数据保存失败')
                    ->with('redirct_url','/consolenode/index') ;
            }else{
                return redirect('/consolenode/index') ;
            }
        }else{
            return redirect('fails')
                ->withErrors($validator)
                ->with('redirct_url','/consolenode/index') ;
        }
    }

    /**
     * 删除菜单
     */
    public function destroy(ConsoleNode $consoleNode){
        return view('admin.console_node.delete',compact('consoleNode')) ;
    }

    /**
     * 提交删除
     */
    public function submitDestroy(Request $request){
        $validator = Validator::make($request->all(),[
            'node_id'=>'required|integer'
        ]) ;
        if($validator->passes()){
            $node_id = $request->input('node_id') ;
            $nodes = ConsoleNode::find($node_id) ;
            if(ConsoleNode::hasChildren($nodes)){
                return redirect('fails')
                    ->withErrors('该节点下存在子节点，不能删除')
                    ->with('redirct_url','/consolenode/index') ;
            }
            $result = $nodes->delete() ;
            if(!$result){
                return redirect('fails')
                    ->withErrors('删除数据失败')
                    ->with('redirct_url','/consolenode/index') ;
            }else{
                return redirect('/consolenode/index') ;
            }
        }else{
            return redirect('fails')
                ->withErrors($validator)
                ->with('redirct_url','/consolenode/index') ;
        }
    }
}