<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('service_subtype', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integerIncrements('id');
            $table->string('name');
            $table->unsignedInteger('service_type')->index();
            $table->timestamps();

            $table->foreign('service_type')->references('id')->on('service_type')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_subtype');
    }
};
