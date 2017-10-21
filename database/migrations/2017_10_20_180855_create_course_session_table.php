<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_session', function (Blueprint $table) {
            $table->increments('id');
            $table->string('session', 31);
            $table->unsignedInteger('course_id');
            $table->timestamps();

            $table->unique(['session', 'course_id']);

            $table->foreign('session')
                ->references('session')->on('sessions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_session');
    }
}
