<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('replaced_parts_info', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integerIncrements('id');
            $table->unsignedInteger('repair_info')->index();
            $table->text('partNumber');
            $table->text('partName');
            $table->float('partPrice');
            $table->unsignedInteger('service')->index();
            $table->float('labourPrice');
            $table->timestamps();

            $table->foreign('repair_info')->references('id')->on('repair_info')->onDelete('cascade');
            $table->foreign('service')->references('id')->on('service_subtype')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('replaced_parts_info');
    }
};
