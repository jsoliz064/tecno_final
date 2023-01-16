<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p2_asistencias', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->timestamp('hora_ingreso')->nullable();
            $table->timestamp('hora_salida')->nullable();
            $table->integer('retraso')->default(0);

            $table->unsignedBigInteger('personal_id');
            $table->foreign('personal_id')->references('id')->on('p2_personal')->onDelete('cascade')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
}
