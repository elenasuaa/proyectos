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
        Schema::create('tipo_hta', function (Blueprint $table) {
            $table->id();
            $table->char("tipo_hta", 60);
            $table->boolean("estatus");
            $table->unsignedBigInteger("fkcategoria");
            $table->foreign("fkcategoria")->references("id")->on("categoria");
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
        Schema::dropIfExists('tipo_hta');
    }
};
