<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoutStructuresTable extends Migration
{
    public function up()
    {
        Schema::create('POUTStructure', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->string('name');
            $table->string('photo');
            $table->string('major');
            $table->integer('batch');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('POUTStructure');
    }
}

