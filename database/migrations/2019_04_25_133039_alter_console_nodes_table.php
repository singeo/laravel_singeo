<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterConsoleNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('console_nodes',function (Blueprint $table){
            $table->tinyInteger('is_route')->default(1)->after('status')->comment('是否需要路由，1需要，0不需要') ;
        }) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('console_nodes', function (Blueprint $table) {
            $table->dropColumn('is_route');
        });
    }
}
