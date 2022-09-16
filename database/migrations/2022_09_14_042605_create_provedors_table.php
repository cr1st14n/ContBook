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
        Schema::create('provedors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('prov_nombre')->nullable();
            $table->string('prov_nit')->nullable();
            $table->string('prov_telf')->nullable();
            $table->string('prov_mail')->nullable();
            $table->string('prov_contacto')->nullable();
            $table->string('prov_telfContacto')->nullable();

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
        Schema::dropIfExists('provedors');
    }
};
