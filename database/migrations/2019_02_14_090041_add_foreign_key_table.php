<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::table('enrolled_courses', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('question_banks', function (Blueprint $table) {
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('question_choices', function (Blueprint $table) {
            $table->foreign('question_id')->references('id')->on('question_banks')->onDelete('restrict')->onUpdate('cascade');
        });
        Schema::table('student_answers', function (Blueprint $table) {
            $table->foreign('question_id')->references('id')->on('question_banks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('question_choice_id')->references('id')->on('question_choices')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('student_performance', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('topics', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('video_datas', function (Blueprint $table) {
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('course_tutors', function (Blueprint $table) {
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {


        Schema::table('enrolled_courses', function (Blueprint $table) {
            $table->dropForeign('student_id_foreign');
            $table->dropForeign('course_id_foreign');
        });

        Schema::table('question_banks', function (Blueprint $table) {
            $table->dropForeign('topic_id_foreign');
        });

        Schema::table('question_choices', function (Blueprint $table) {
            $table->dropForeign('question_id_foreign');
        });
        Schema::table('student_answers', function (Blueprint $table) {
            $table->dropForeign('question_id_foreign');
            $table->dropForeign('student_id_foreign');
            $table->dropForeign('question_choice_id_foreign');
        });
        Schema::table('student_performance', function (Blueprint $table) {
            $table->dropForeign('course_id_foreign');
            $table->dropForeign('student_id_foreign');
            $table->dropForeign('topic_id_foreign');
        });
        Schema::table('topics', function (Blueprint $table) {
            $table->dropForeign('course_id_foreign');
        });
        Schema::table('video_datas', function (Blueprint $table) {
            $table->dropForeign('topic_id_foreign');
        });
        Schema::table('course_tutors', function (Blueprint $table) {
            $table->dropForeign('topic_id_foreign');
            $table->dropForeign('tutor_id_foreign');
        });
    }
}
