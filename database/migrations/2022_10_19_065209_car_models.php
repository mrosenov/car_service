<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integerIncrements('id');
            $table->string('name', 25);
            $table->unsignedInteger('car_make')->index();
            $table->timestamps();

            $table->foreign('car_make')->references('id')->on('car_makes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('car_models');
    }
};
