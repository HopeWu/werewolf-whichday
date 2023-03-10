<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('which_day', function (Blueprint $table){
            $table->id();
            $table->timestamps();

            $table->string('wechat_name');
            $table->date("which_day");
            $table->time('time')->nullable();
            $table->string('activity_code');
            $table->string('reserve1')->nullable();
            $table->string('reserve2')->nullable();
            $table->string('reserve3')->nullable();
            $table->string('reserve4')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('which_day');
    }
};
