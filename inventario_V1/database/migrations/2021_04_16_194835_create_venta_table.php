<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->id();
            $table->string("codigo_venta");
            $table->date("fec_venta");
            $table->float("total_venta");
            $table->unsignedBigInteger("fkcliente");
            $table->foreign("fkcliente")->references("id")->on("cliente")->onDelete("cascade");
            $table->unsignedBigInteger("fkproducto");
            $table->foreign("fkproducto")->references("id")->on("producto")->onDelete("cascade");
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
        Schema::dropIfExists('venta');
    }
}
