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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('pdo_cod')->nullable();
            $table->string('pdo_cod2')->nullable();
            $table->string('pdo_nomGen')->nullable();
            $table->string('pdo_nomComer')->nullable();
            $table->string('pdo_desc')->nullable();
            $table->string('pdo_concentracion')->nullable();
            $table->string('pdo_uMedica')->nullable();
            $table->string('pdo_formFarm')->nullable();
            $table->string('pdo_cant')->nullable();
            $table->string('pdo_preUniVenta1')->nullable();
            $table->string('pdo_preUniVenta2')->nullable();
            $table->string('pdo_preUniVenta3')->nullable();
            $table->string('pdo_id_provedor')->nullable();
           
            //campos de auditoria 
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
        Schema::dropIfExists('productos');
    }
};
