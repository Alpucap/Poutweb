<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServantsTable extends Migration
{
    public function up()
    {
        Schema::create('servants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('major');
            $table->string('batch');
            $table->string('role'); // PD atau PJ
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('servants');
    }
}
