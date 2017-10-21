<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('task_id');
            $table->text('submission');
            $table->string('student_id', 15);
            $table->tinyInteger('status');
            $table->timestamps();

            $table->foreign('task_id')
                ->references('id')->on('tasks')
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
        Schema::dropIfExists('submissions');
    }
}
