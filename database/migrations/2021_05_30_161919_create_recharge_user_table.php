<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechargeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recharge_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('userName');
            $table->integer('userID');
            $table->integer('accountNumber');
            $table->integer('amount');
            $table->string('rechargedBy');
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
        Schema::dropIfExists('recharge_user');
    }
}
