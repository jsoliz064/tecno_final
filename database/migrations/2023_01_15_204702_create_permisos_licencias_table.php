<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosLicenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p2_permisos_licencias', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('documento');
            $table->integer('dias_habiles');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');

            $table->unsignedBigInteger('id_personal');
            $table->foreign('id_personal')->references('id')->on('p2_personal')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('id_tipo');
            $table->foreign('id_tipo')->references('id')->on('p2_tipo_permisos_licencias')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos_licencias');
    }
}
