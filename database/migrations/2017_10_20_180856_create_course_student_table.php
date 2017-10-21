<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_student', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('courser_id');
            $table->string('student_id', 15);
            $table->boolean('is_approved')->default('0');
            $table->timestamps();

            $table->unique(['courser_id', 'student_id']);

            $table->foreign('courser_id')
                ->references('id')->on('course_session')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('student_id')
                ->references('id')->on('students')
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
        Schema::dropIfExists('course_student');
    }
}
