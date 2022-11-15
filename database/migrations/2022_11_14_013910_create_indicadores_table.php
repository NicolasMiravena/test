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
        Schema::create('indicadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombreIndicador', 50);
            $table->string('codigoIndicador', 50);
            $table->string('unidadMedidaIndicador', 50);
            $table->decimal('valorIndicador', 10, 2);
            $table->date('fechaIndicador');
            $table->string('tiempoIndicador', 50)->nullable();
            $table->string('origenIndicador', 50);
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
        Schema::dropIfExists('indicadores');
    }
};
