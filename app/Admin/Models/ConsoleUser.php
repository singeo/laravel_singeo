<?php
/**
 * 后台用户模型，该模型使用laravel认证类
 */

namespace App\Admin\Models;


use Illuminate\Auth\Authenticatable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

class ConsoleUser extends Model implements AuthenticatableContract
{
    use Authenticatable ;
    /**
     * 在模型数组或 JSON 显示中隐藏的属性
     *
     * @var array
     */
    protected $hidden = [
        'user_pass'
    ];


    /**
     * 记住密码字段
     * @var string
     */
//    protected $rememberTokenName = '';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->rememberTokenName = '' ;
    }

    /**
     * 自定义的密码字段, 无此，对于密码字段名不为password的登录时将出现密码不存在
     * @return string
     */

    public function getAuthPassword() {
        // 一定要返回加密了的密码
        return $this->user_pass;
    }
}
