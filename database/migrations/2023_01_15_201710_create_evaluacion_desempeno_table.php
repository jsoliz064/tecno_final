<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionDesempenoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p2_evaluacion_desempeno', function (Blueprint $table) {
            $table->id();
            $table->string('gestion');
            $table->string('categoria');
            $table->string('link')->nullable();

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
        Schema::dropIfExists('evaluacion_desempeno');
    }
}
