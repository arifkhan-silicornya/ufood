<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('instituteName');
            $table->string('studentid')->unique();
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string('usertype')->nullable();
            $table->integer('contact');
            $table->string('address')->nullable();
            $table->string('department')->nullable();
            $table->string('batch')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profilePic')->default('avatar.jpg');
            $table->integer('verified')->default(1);
            $table->integer('deleted')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
