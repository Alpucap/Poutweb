<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCounselingTopicsTable extends Migration
{
    public function up()
    {
        Schema::create('counseling_topics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('user_name');
            $table->text('topic');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('counseling_topics');
    }
}