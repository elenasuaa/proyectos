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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->char("username", 50);
            $table->char("contra", 50);
            $table->boolean("estatus");
            $table->unsignedBigInteger("fkpersona");
            $table->foreign("fkpersona")->references("id")->on("persona");
            $table->unsignedBigInteger("fktipo_usuario");
            $table->foreign("fktipo_usuario")->references("id")->on("tipo_usuario");
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
        Schema::dropIfExists('usuario');
    }
};
