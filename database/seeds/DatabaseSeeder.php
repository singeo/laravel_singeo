<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB ;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('console_users')->insert([
            'user_login'=>'master',
            'user_pass'=>bcrypt('123456'),
            'user_nickname'=>'超级管理员',
            'user_email'=>'123@123.com',
        ]) ;
    }
}
