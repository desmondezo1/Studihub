<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('mime_type')->nullable();
            $table->string('mime_size')->nullable();
            $table->string('file_name')->nullable();
            $table->string('mime_path')->nullable();
            $table->longText('notes')->nullable();
            $table->enum('exam_type',['GCE','JAMB','WAEC','NECO']);
            $table->boolean('hidden')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->bigInteger('views')->default(0);
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
