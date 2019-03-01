<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->unsignedInteger('course_id');
            $table->boolean('isfree')->default(0);
            $table->string('mime_type');
            $table->string('mime_size');
            $table->string('file_name');
            $table->string('mime_path');
            $table->longText('notes')->nullable();
            $table->enum('exam_type',['GCE','JAMB','WAEC','NECO']);
            $table->boolean('visible')->default(true);
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('topics');
    }
}
