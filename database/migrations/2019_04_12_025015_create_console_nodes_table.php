<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsoleNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('console_nodes', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->Integer('pid')->unsigned()->comment('父节点ID');
            $table->tinyInteger('type')->unsigned()->default(1)->comment('菜单类型;1:菜单,2:操作');
            $table->tinyInteger('status')->default(1)->comment('状态;1:正常,-1:禁用');
            $table->String('node_name',30)->comment('节点名称') ;
            $table->String('node_icon',30)->nullable()->comment('节点图标') ;
            $table->String('node_url',100)->comment('节点链接地址') ;
            $table->smallInteger('sort')->unsigned()->comment('排序');
            $table->timestamps() ;
            $table->comment = '后台节点表' ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('console_nodes');
    }
}
