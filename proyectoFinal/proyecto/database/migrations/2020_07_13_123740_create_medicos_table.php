<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre", 50);
            $table->string("apellido", 50);
            $table->string("usuario", 30);
            $table->string("password", 30);
            $table->string("sexo", 20);
            $table->string("domicilio", 100);
            $table->string("telefono", 20);
            $table->unsignedInteger("tipo", false)->change;
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
        Schema::dropIfExists('medicos');
    }
}
