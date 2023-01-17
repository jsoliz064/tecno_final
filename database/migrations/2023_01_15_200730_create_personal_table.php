<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p2_personal', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('ci');
            $table->string('genero');
            $table->date('fecha_nacimiento');
            $table->string('correo');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('estado_civil');
            $table->unsignedBigInteger('tipo_personal_id')->nullable();
            $table->foreign('tipo_personal_id')->references('id')->on('p2_tipo_personal')->onDelete('set null')->onUpdate('cascade');
            $table->unsignedBigInteger('horario_id')->nullable();
            $table->foreign('horario_id')->references('id')->on('p2_horarios')->onDelete('set null')->onUpdate('cascade');
            
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            
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
        Schema::dropIfExists('personal');
    }
}
