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
        Schema::create('caducidads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('id_pro');
            $table->integer('id_provedor');
            $table->string('cad_lote');
            $table->string('cad_cantidad');
            $table->date('cad_fecha');

            
            // *campos de auditoria 
            $table->integer('ca_usu_cod')->nullable();
            $table->string('ca_tipo', 10)->nullable();
            $table->integer('ca_estado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caducidads');
    }
};
