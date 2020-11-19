<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('Name')->nullable();
            $table->string('LastName')->nullable();
            $table->string('Email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('Password')->nullable();
            $table->string('Phone')->nullable();
            $table->string('Token')->nullable();
            $table->enum('Role', array('admin', 'user', 'guest'))->default('guest');
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
        Schema::dropIfExists('users');
    }
}
