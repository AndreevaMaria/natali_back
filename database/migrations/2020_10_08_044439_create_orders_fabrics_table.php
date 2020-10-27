<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersFabricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_fabrics', function (Blueprint $table) {
            $table->increments('id')->unsigned();;
            $table->integer('idFabric')->unsigned();
            $table->integer('idOrder')->unsigned();
            $table->text('Notice')->nullable();
            $table->integer('Amount');
            $table->timestamps();
            $table->foreign('idOrder')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('orders_fabrics');
    }
}
