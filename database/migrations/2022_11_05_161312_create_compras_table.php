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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('compra_data');
             // *campos de auditoria
             $table->integer('ca_usu_cod')->nullable();
             $table->string('ca_tipo', 10)->nullable();
             $table->integer('ca_estado')->nullable();
            //  $table->longText('ca_ubi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
};
