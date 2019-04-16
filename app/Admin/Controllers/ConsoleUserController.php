<?php
/**
 * 后台用户管理控制器
 * User: singeo
 * Date: 4/8/19
 * Time: 2:40 PM
 */

namespace App\Admin\Controllers;


use App\Admin\Models\ConsoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsoleUserController
{
    /**
     * 管理人员列表页面
     */
    public function index()
    {
        $userList = ConsoleUser::where('id','<>',1)
            ->orderBy('id','desc')
            ->paginate(10) ;
        return view('admin.console_user.index',compact('userList')) ;
    }

    /**
     * 新增管理人员页面
     */
    public function create()
    {
        return view('admin.console_user.create') ;
    }

    /**
     * 提交新增管理员
     * @param Request $request
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'user_login'=>'required|max:20|min:2|unique:console_users',
            'user_nickname'=>'required|max:20|min:2',
            'email'=>'nullable|email',
            'mobile'=>'nullable|mobile',
            'user_pass'=>'required|max:24|min:6'
        ]) ;
        if($validator->passes()){
            $users = new ConsoleUser() ;
            $users->user_login = $request->input('user_login') ;
            $users->user_nickname = $request->input('user_nickname') ;
            $users->user_email = $request->input('email') ;
            $users->mobile = $request->input('mobile') ;
            $users->user_pass = bcrypt($request->input('user_pass')) ;
            $users->user_status = $request->input('user_status') ;
            $result = $users->save() ;
            if(!$result){
                return redirect('fails')
                    ->withErrors('保存数据失败')
                    ->with('redirct_url','/consoleuser/index') ;
            }else{
                return redirect('/consoleuser/index') ;
            }
        }else{
            return redirect('fails')
                ->withErrors($validator)
                ->with('redirct_url','/consoleuser/index') ;
        }
    }

    /**
     * 编辑管理人员页面
     * @param \App\Admin\Models\ConsoleUser $consoleUser
     */
    public function edit(ConsoleUser $consoleUser)
    {
        return view('admin.console_user.edit',compact('consoleUser')) ;
    }

    /**
     * 保存修改的管理人员数据
     * @param Request $request
     */
    public function save(Request $request){
        $validator = Validator::make($request->all(),[
            'user_id'=>'required|integer',
            'user_login'=>[
                'required',
                'max:20',
                'min:2',
                \Illuminate\Validation\Rule::unique('console_users')->ignore($request->input('user_id'))
            ],
            'user_nickname'=>'required|max:20|min:2',
            'email'=>'nullable|email',
            'mobile'=>'nullable|mobile',
            'user_pass'=>'nullable|max:24|min:6'
        ]) ;
        if($validator->passes()){
            $user_id = $request->input('user_id') ;
            $users = ConsoleUser::find($user_id);
            $users->user_login = $request->input('user_login') ;
            $users->user_nickname = $request->input('user_nickname') ;
            $users->user_email = $request->input('email') ;
            $users->mobile = $request->input('mobile') ;
            $password = $request->input('user_pass') ;
            if(!empty($password)){
                $users->user_pass = bcrypt($password) ;
            }
            $users->user_status = $request->input('user_status') ;
            $result = $users->save() ;
            if(!$result){
                return redirect('fails')
                    ->withErrors('保存数据失败')
                    ->with('redirct_url','/consoleuser/index') ;
            }else{
                return redirect('/consoleuser/index') ;
            }
        }else{
            return redirect('fails')
                ->withErrors($validator)
                ->with('redirct_url','/consoleuser/index') ;
        }
    }
}