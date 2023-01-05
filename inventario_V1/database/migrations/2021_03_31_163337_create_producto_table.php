<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->integer("precio");
            $table->integer("costo");
            $table->text("descripcion");
            $table->integer("stock");
            $table->integer("iva");
            $table->boolean("estatus");
            $table->unsignedBigInteger("fkcategoria");
            $table->foreign("fkcategoria")->references("id")->on("categoria")->onDelete("cascade");
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
        Schema::dropIfExists('producto');
    }
}
