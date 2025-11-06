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
        Schema::create('respostas_avaliacao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('avaliacoes_id')->constrained('avaliacoes')->onDelete('cascade');
            $table->foreignId('tipo_criterios_id')->constrained('tipo_criterios');
            $table->integer('valor_atribuido'); // O valor da opção no momento da resposta
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
        Schema::dropIfExists('resposta_avaliacaos');
    }
};
