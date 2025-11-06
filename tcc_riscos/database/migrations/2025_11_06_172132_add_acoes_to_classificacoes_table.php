<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('classificacoes', function (Blueprint $table) {
            // Adiciona a nossa nova coluna
            $table->text('acoes_recomendadas')->nullable()->after('intervalo_max');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('classificacoes', function (Blueprint $table) {
            // Permite reverter (desfazer) a alteração
            $table->dropColumn('acoes_recomendadas');
        });
    }
};
