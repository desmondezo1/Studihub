<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('qualification', 255)->nullable();
            $table->string('bio')->nullable();
            $table->timestamp('banned_at')->nullable();
            $table->enum('gender',['male', 'female']);
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_code');
            $table->boolean('verified')->default(0);
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
