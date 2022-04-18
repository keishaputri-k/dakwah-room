<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('type');
            $table->string('category');
            $table->string('lecturer');
            $table->string('date');
            $table->string('time');
            $table->string('cp');
            $table->string('location');
            $table->string('city');
            $table->integer('quota');
            $table->string('poster_photo_path', 2048)->nullable();
            $table->string('form_link');
            $table->string('group_link');
            $table->string('orginizer_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lectures');
    }
}
