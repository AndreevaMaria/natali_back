<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments("id")->unsigned();;
            $table->integer('idFabric')->unsigned()->nullable();
            $table->integer('idFabricsType')->unsigned();
            $table->string("Imagepath");
            $table->string("ImageNotice")->nullable();
            $table->timestamps();
            $table->foreign('idFabric')->references('id')->on('fabrics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
