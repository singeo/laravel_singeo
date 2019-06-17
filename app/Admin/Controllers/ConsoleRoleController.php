<?php
/**
 * 角色管理
 * User: singeo
 * Date: 2019/4/16 0016
 * Time: 上午 9:47
 */

namespace App\Admin\Controllers;


use App\Admin\Models\ConsoleRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsoleRoleController extends Controller
{
    /**
     * 角色列表
     */
    public function index(){
        $tree = \App\Admin\Models\ConsoleNode::getNodeTree() ;
        $roleList = ConsoleRole::orderBy('sort')
            ->orderByDesc('id')
            ->paginate() ;
        return view('admin.console_role.index',compact('roleList')) ;
    }

    /**
     * 创建角色
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('admin.console_role.create') ;
    }

    /**
     * 保存创建的角色
     * @param Request $request
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'role_name'=>'required|max:20|min:2|unique:console_roles',
        ]) ;
        if($validator->passes()){
            $roles = new ConsoleRole() ;
            $roles->role_name = $request->input('role_name') ;
            $roles->sort = $request->input('sort') ;
            $roles->status = $request->input('status') ;
            $result = $roles->save() ;
            if(!$result){
                return redirect('fails')
                    ->withErrors('保存数据失败')
                    ->with('redirct_url','/consolerole/index') ;
            }else{
                return redirect('/consolerole/index') ;
            }
        }else{
            return redirect('fails')
                ->withErrors($validator)
                ->with('redirct_url','/consolerole/index') ;
        }
    }

    /**
     * 编辑角色页面
     * @param ConsoleRole $consoleRole
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(ConsoleRole $consoleRole){
        return view('admin.console_role.edit',compact('consoleRole')) ;
    }

    /**
     * 提交编辑角色
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(Request $request){
        $validator = Validator::make($request->all(),[
            'role_name'=>[
                'required',
                'max:20',
                'min:2',
                \Illuminate\Validation\Rule::unique('console_roles')->ignore($request->input('role_id'))
            ],
            'role_id'=>'required|integer'
        ]) ;
        if($validator->passes()){
            $role_id = $request->input('role_id') ;
            $roles = ConsoleRole::find($role_id) ;
            $roles->role_name = $request->input('role_name') ;
            $roles->sort = $request->input('sort') ;
            $roles->status = $request->input('status') ;
            $result = $roles->save() ;
            if(!$result){
                return redirect('fails')
                    ->withErrors('保存数据失败')
                    ->with('redirct_url','/consolerole/index') ;
            }else{
                return redirect('/consolerole/index') ;
            }
        }else{
            return redirect('fails')
                ->withErrors($validator)
                ->with('redirct_url','/consolerole/index') ;
        }
    }

    /**
     * 角色授权
     */
    public function rolenode(ConsoleRole $consoleRole){
        $nodeList = \App\Admin\Models\ConsoleNode::getChannelTree() ;
        $myNodes = $consoleRole->rolerules ;
        return view('admin.console_role.rolenode',compact('consoleRole','nodeList','myNodes')) ;
    }

    /**
     * 保存角色权限
     */
    public function roleAccess(Request $request,ConsoleRole $consoleRole)
    {
        $rules = $request->get('rules') ;
        $consoleRole->grantRules()->sync($rules) ;
        return redirect('success')
            ->with(['message'=>'授权成功','redirct_url'=>'/consolerole/index']) ;
    }
}