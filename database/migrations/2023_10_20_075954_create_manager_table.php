<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CreateManagerTable extends Migration
{
    protected $timestamps = true;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manager_name');
            $table->string('institute_name');
            $table->string('email')->unique();
            $table->bigInteger('NID')->unique();
            $table->integer('phone');
            $table->string('address');
            $table->string('gender');
            $table->integer('active')->default(1);
            $table->string('manager_password');
            $table->string('profilePicture')->default('avatar.jpg');
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
        Schema::dropIfExists('manager');
    }
}
