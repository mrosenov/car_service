<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('car_info', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integerIncrements('id');
            $table->unsignedInteger ('ownerID')->unsigned()->index();
            $table->unsignedInteger ('car_make')->unsigned()->index();
            $table->unsignedInteger ('car_model')->unsigned()->index();
            $table->text('reg_plate');
            $table->text('vin');
            $table->timestamps();

            $table->foreign('ownerID')->references('id')->on('client_info')->onDelete('cascade');
            $table->foreign('car_make')->references('id')->on('car_makes')->onDelete('cascade');
            $table->foreign('car_model')->references('id')->on('car_models')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('car_info');
    }
};
