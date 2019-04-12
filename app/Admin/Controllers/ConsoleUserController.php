<?php
/**
 * 后台用户管理控制器
 * User: singeo
 * Date: 4/8/19
 * Time: 2:40 PM
 */

namespace App\Admin\Controllers;


class ConsoleUserController
{
    /**
     * 管理人员列表页面
     */
    public function index()
    {
        echo 'index';
    }

    /**
     * 新增管理人员页面
     */
    public function add()
    {
        echo 'add' ;
    }

    /**
     * 编辑管理人员页面
     * @param \App\Admin\Models\ConsoleUser $consoleUser
     */
    public function edit(\App\Admin\Models\ConsoleUser $consoleUser)
    {
        dd($consoleUser) ;
    }
}