<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("idUser")->unsigned();
            $table->integer("OrderNum");
            $table->date("OrderDate");
            $table->integer('idFabric')->unsigned();
            $table->integer('Amount');
            $table->date('FinalDate');
            $table->enum('OrderStatus', array ('Создан', 'Оформлен', 'Оплачен', 'В пути', 'Получен'))->default('Создан');
            $table->timestamps();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idFabric')->references('id')->on('fabrics')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
