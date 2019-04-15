<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsoleRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('console_roles', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->string('role_name',30)->unique()->comment('角色名称');
            $table->smallInteger('sort')->unsigned()->comment('排序');
            $table->tinyInteger('status')->default(1)->comment('角色状态;-1:禁用,1:正常');
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
        Schema::dropIfExists('console_roles');
        //
    }
}
