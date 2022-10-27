<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('worker_info', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integerIncrements('id');
            $table->string('name');
            $table->text('phone');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('worker_info');
    }
};
