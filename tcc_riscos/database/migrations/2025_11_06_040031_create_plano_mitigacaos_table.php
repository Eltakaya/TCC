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
        Schema::create('planos_mitigacao', function (Blueprint $table) {
            $table->id();
            $table->text('descricao')->nullable();
            $table->date('data_criacao');
            $table->foreignId('avaliacoes_id')->constrained('avaliacoes')->onDelete('cascade');
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
        Schema::dropIfExists('plano_mitigacaos');
    }
};
