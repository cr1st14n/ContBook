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
        Schema::create('promovs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // $table->string('id_pro')->nullable();
            // $table->string('pm_tipo')->nullable();
            // $table->string('pm_cantidad')->nullable();
            // $table->longText('pm_tipo')->nullable();

            // $table->string('pdo_prov')->nullable();
            // $table->string('pdo_costUni')->nullable();
            // $table->string('pdo_costTotal')->nullable();
            // $table->string('pdo_preciVenta')->nullable();
            // $table->string('pdo_preciTotal')->nullable();
            // //campos de auditoria 
            // $table->integer('ca_usu_cod')->nullable();
            // $table->string('ca_tipo', 10)->nullable();
            // $table->integer('ca_estado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promovs');
    }
};
