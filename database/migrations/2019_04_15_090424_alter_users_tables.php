<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('console_users',function (Blueprint $table){
            $table->timestamp('last_login_time')->nullable()->after('login_times') ;
        }) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('console_users', function (Blueprint $table) {
            $table->dropColumn('last_login_time');
        });
    }
}
