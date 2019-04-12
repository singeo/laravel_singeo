<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsoleRolesNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('console_roles_nodes', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->Integer('role_id')->unsigned()->comment('角色ID');
            $table->Integer('node_id')->unsigned()->comment('节点ID');
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
        Schema::dropIfExists('console_roles_nodes');
    }
}
