<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->nullable();
            $table->string('code');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table("users")->insert(['name'=>'Anne Lyon','email'=>'admin1@test.com','password'=>bcrypt('admin1'),'role'=>'admin','code'=>'8844']);
        DB::table("users")->insert(['name'=>'Maylin Pinedo','email'=>'judge@test.com','password'=>bcrypt('judge'),'role'=>'judge','code'=>'4488']);
        DB::table("users")->insert(['name'=>'Edisson Galvez','email'=>'user@test.com','password'=>bcrypt('user'),'role'=>'user','code'=>'9900']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
