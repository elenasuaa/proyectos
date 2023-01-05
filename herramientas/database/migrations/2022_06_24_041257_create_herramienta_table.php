<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('herramienta', function (Blueprint $table) {
            $table->id();
            $table->char("codigo_ID", 10);
            $table->char("nombre_hta", 50);
            $table->integer("stock");
            $table->text("estado");
            $table->boolean("estatus");
            $table->unsignedBigInteger("fktipo_hta");
            $table->foreign("fktipo_hta")->references("id")->on("tipo_hta");
            $table->unsignedBigInteger("fkmarca");
            $table->foreign("fkmarca")->references("id")->on("marca");
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
        Schema::dropIfExists('herramienta');
    }
};
