<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('firstname', 255);
            $table->string('lastname', 255);
            $table->longText('bio')->nullable();
            $table->timestamp('banned_at')->nullable();
            $table->enum('gender',['male', 'female']);
            $table->string('qualification', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->date('dob')->nullable();
            $table->integer('state')->nullable();
            $table->string('city', 255)->nullable();
            $table->string('school', 255)->nullable();
            $table->string('course', 255)->nullable();
            $table->string('degree', 255)->nullable();
            $table->string('company', 255)->nullable();
            $table->string('experience', 255)->nullable();
            $table->string('role',255)->nullable();
            $table->boolean('stillworkthere')->nullable();
            $table->enum('classname',['nursery','jsecondary','ssecondary'])->nullable();
            $table->enum('curriculum',['nigerian','british','american'])->nullable();
           // $table->json('social_media')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('avatar')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('tutors');
    }
}
