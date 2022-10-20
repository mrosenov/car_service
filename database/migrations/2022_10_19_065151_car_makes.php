<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('car_makes', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integerIncrements('id');;
            $table->string('name', 25);
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('car_makes');
    }
};
