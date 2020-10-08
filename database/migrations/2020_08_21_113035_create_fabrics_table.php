<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabrics', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('idFabricsType')->unsigned();
            $table->string("Title");
            $table->string("Articul");
            $table->string("Price");
            $table->string("PriceNew")->nullable();
            $table->string("Decsription")->nullable();
            $table->string("FabricComposition");
            $table->string("FabricWidth");
            $table->string("FabricDensity")->nullable();
            $table->boolean('isOneton')->default('0')->nullable();
            $table->boolean('isNew')->default('0')->nullable();
            $table->boolean('isAction')->default('0')->nullable();
            $table->boolean('isTrend')->default('0')->nullable();
            $table->boolean('isAvable')->default('1')->nullable();
            $table->timestamps();
            $table->foreign('idFabricsType')->references('id')->on('fabrics_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fabrics');
    }
}
