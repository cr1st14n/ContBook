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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('id_cliente')->nullable();
            $table->string('pdd_cantidad')->nullable();
            $table->dateTime('pdd_fecha2')->nullable();
            $table->string('pdd_respaldo')->nullable();
            $table->string('pdd_costo')->nullable();
            $table->string('pdd_region')->nullable();
            $table->longText('pdd_productos')->nullable();
            $table->boolean('pdd_estVen')->nullable();

            // *campos de auditoria
            $table->integer('ca_usu_cod')->nullable();
            $table->string('ca_tipo', 10)->nullable();
            $table->integer('ca_estado')->nullable();
            $table->longText('ca_ubi')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
