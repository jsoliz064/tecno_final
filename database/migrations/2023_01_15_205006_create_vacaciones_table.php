<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p2_vacaciones', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_inicio')->nullable();
            $table->timestamp('fecha_fin')->nullable();
            $table->integer('dias_habiles')->default(0);
            $table->integer('dias_interrumpidos')->default(0);

            $table->boolean('estado')->default(false);
            $table->timestamp('fecha_aprob')->nullable();

            $table->unsignedBigInteger('tipo_vacaciones_id');
            $table->foreign('tipo_vacaciones_id')->references('id')->on('p2_tipo_vacaciones')->onDelete('cascade')->onUpdate('cascade');
           
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
        Schema::dropIfExists('vacaciones');
    }
}
