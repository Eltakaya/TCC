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
        Schema::create('tipo_criterios', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 200); // Ex: "Ar-condicionado", "Ventilador"
            $table->integer('valor'); // A pontuação desta opção
            $table->foreignId('criterios_id')->constrained('criterios')->onDelete('cascade');
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
        Schema::dropIfExists('tipo_criterios');
    }
};
