<?php
/**
 * 后台登录控制器
 * User: singeo
 * Date: 4/4/19
 * Time: 2:22 PM
 */

namespace app\Admin\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * 登录页面
     * @return view
     */
    public function index()
    {
        return view('admin.login.index') ;
    }

    /**
     * 登录图形验证码输出
     */
    public function verify()
    {
        //创建验证码对象
        $builder = new \Gregwar\Captcha\CaptchaBuilder();
        $builder->build(160, 60,null);
        $phrase = $builder->getPhrase();
        session()->flash("verify_code", $phrase);
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type: image/jpeg");
        return $builder->output();
    }

    /**
     * 执行登录
     * @param Request $request
     * @return view
     */
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_login'=>'required|min:2|max:20' ,
            'user_pass'=>'required|min:6|max:24' ,
            'verify_code'=>'required' ,
        ]) ;
        if($validator->fails()){
            return back()->withErrors($validator)->withInput() ;
        }else{
            $verify_code = $request->input('verify_code') ;
            if($verify_code !== session('verify_code')){
                return back()->withErrors('图形验证码错误')->withInput() ;
            }
            $login['user_login'] = $request->input('user_login') ;
            $login['password'] = $request->input('user_pass') ;
            $login['user_status'] = 1 ;
            if(Auth::guard('consoleUser')->attempt($login)) {
                return redirect('/') ;
            }else{
                return back()->withErrors('用户名或密码错误')->withInput() ;
            }
        }
    }

    /**
     * 管理员推出
     * @return redirect
     */
    public function logout(){
        Auth::guard('consoleUser')->logout() ;
        return redirect('/login') ;
    }
}