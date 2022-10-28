<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('repair_info', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integerIncrements('id');
            $table->unsignedInteger('car_info_id')->index();
            $table->unsignedInteger('worker')->index();
            $table->float('totalPrice')->nullable();
            $table->timestamps();

            $table->foreign('car_info_id')->references('id')->on('car_info')->onDelete('cascade');
            $table->foreign('worker')->references('id')->on('worker_info')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('repair_info');
    }
};
