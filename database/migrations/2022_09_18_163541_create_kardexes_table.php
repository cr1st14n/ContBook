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
        Schema::create('kardexes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('id_pro')->nullable();
            $table->string('kd_detalle')->nullable();
            $table->string('kd_respaldo')->nullable();
            $table->string('kd_ent')->nullable();
            $table->string('kd_sal')->nullable();
            $table->string('kd_sdo_fis')->nullable();
            $table->string('kd_costo')->nullable();
            $table->string('kd_deb')->nullable();
            $table->string('kd_hab')->nullable();
            $table->string('kd_sdo_val')->nullable();

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
        Schema::dropIfExists('kardexes');
    }
};
