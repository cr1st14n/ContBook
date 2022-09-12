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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->string('usu_cod')->nullable();
            $table->integer('usu_ci')->nullable();
            $table->string('usu_nombre')->nullable();
            $table->string('usu_appaterno',30)->nullable();
            $table->string('usu_apmaterno',30)->nullable();
            $table->string('usu_sexo',10)->nullable();
            $table->date('usu_fechnac')->nullable();

            // $table->string('usu_paisnac',50)->nullable();
            // $table->string('usu_depnac',50)->nullable();
            // $table->string('usu_estadocivil',10)->nullable();
            $table->integer('usu_telf')->nullable();
            // $table->integer('usu_telfref')->nullable();
            // $table->string('usu_zona',50)->nullable();
            $table->string('usu_domicilio',200)->nullable();

            //datos de area
            // $table->string('usu_tipo',20)->nullable();
            // $table->string('usu_area',20)->nullable();
            // $table->string('usu_cargo',20)->nullable();
            // $table->string('usu_contrato',20)->nullable();
            // $table->string('usu_especialidad',50)->nullable();
            $table->string('usu_grupoPermiso',5)->nullable();
            $table->string('usu_estado',5)->nullable();
            
             //campos de auditoria 
            $table->integer('ca_usu_cod')->nullable();
            $table->string('ca_tipo',10)->nullable();
            // $table->dateTime('ca_fecha')->nullable();
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
        Schema::dropIfExists('users');
    }
};
