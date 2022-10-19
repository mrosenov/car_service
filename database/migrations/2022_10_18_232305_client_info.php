<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('client_info', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->string('name', 40);
            $table->string('phone',11);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('client_info');
    }
};
