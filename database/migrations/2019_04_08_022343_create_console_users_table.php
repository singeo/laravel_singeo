<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsoleUsersTable extends Migration
{
    /**
     * 后台用户数据表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('console_users', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->string('user_login',30)->unique()->comment('用户登录名');
            $table->char('user_pass',100)->comment('登录密码');
            $table->string('user_nickname',30)->default('')->comment('用户昵称');
            $table->string('user_email',50)->default('')->comment('邮箱');
            $table->string('mobile',11)->default('')->comment('用户手机号');
            $table->string('avatar',100)->default('')->comment('用户头像');
            $table->tinyInteger('user_status')->default(1)->comment('用户状态;-1:禁用,1:正常');
            $table->smallInteger('login_times')->default(0)->comment('登录次数');
            $table->string('last_login_ip',15)->default(0)->comment('最后登录ip');
//            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('console_users');
        //
    }
}
