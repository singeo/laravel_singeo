<?php
/**
 * 角色管理模型
 * User: singeo
 * Date: 2019/4/16 0016
 * Time: 上午 10:06
 */

namespace App\Admin\Models;


use Illuminate\Database\Eloquent\Model;

class ConsoleRole extends Model
{
    /**
     * 不能被批量赋值的属性
     * @var array
     */
    protected $guarded = [] ;

    /**
     * 获取当前用户的权限
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rolerules(){
        return $this->belongsToMany( ConsoleNode::class,'console_roles_nodes', 'role_id','node_id')
            ->withPivot('role_id','node_id');
    }
    /**
     * 角色授权
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function grantRules()
    {
        return $this->rolerules() ;
    }


}