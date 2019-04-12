<?php
/**
 * 后台首页管理
 * User: singeo
 * Date: 4/11/19
 * Time: 11:11 AM
 */

namespace App\Admin\Controllers;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index.index') ;
    }
}