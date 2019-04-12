<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaPedidoItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_item', function (Blueprint $table) {
            $table->bigInteger('pedido_id')->unsigned();
            $table->foreign("pedido_id")->references("id")->on("pedido");
            $table->bigInteger('item_id')->unsigned();
            $table->foreign("item_id")->references("id")->on("item");
            $table->timestamps();
            $table->primary(["item_id", "pedido_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_item');
    }
}
