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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('cli_nombre')->nullable();
            $table->string('cli_ci')->nullable();
            $table->string('cli_razonSocial')->nullable();
            $table->string('cli_razonSocialNit')->nullable();
            $table->string('cli_telf')->nullable();
            $table->string('cli_mail')->nullable();
            $table->string('cli_direccion')->nullable();
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
        Schema::dropIfExists('clientes');
    }
};
