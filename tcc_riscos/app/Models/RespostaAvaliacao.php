<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespostaAvaliacao extends Model
{
    use HasFactory;

    protected $table = 'respostas_avaliacao';

    protected $fillable = [
        'avaliacoes_id',
        'tipo_criterios_id',
        'valor_atribuido',
    ];

    // Relacionamento: Uma Resposta pertence a uma Avaliação
    public function avaliacao()
    {
        return $this->belongsTo(Avaliacao::class, 'avaliacoes_id');
    }

    // Relacionamento: Uma Resposta se refere a uma Opção (TipoCriterio)
    public function tipoCriterio()
    {
        return $this->belongsTo(TipoCriterio::class, 'tipo_criterios_id');
    }
}