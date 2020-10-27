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
            $table->increments("id")->unsigned();
            $table->integer("idUser")->unsigned();
            $table->integer("OrderNum");
            $table->date("OrderDate");
            $table->text("TotalSum")->nullable();
            $table->text("TotalDiscount")->nullable();
            $table->date('FinalDate');
            $table->enum('OrderStatus', array ('Создан', 'Оформлен', 'Оплачен', 'В пути', 'Получен'))->default('Создан');
            $table->text('Note')->nullable();
            $table->timestamps();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
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
