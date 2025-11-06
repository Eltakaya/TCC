<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'avaliacoes';

    protected $fillable = [
        'data_avaliacao',
        'pontuacao_total',
        'eventos_id',
        'classificacoes_id',
    ];

    // Relacionamento: Uma Avaliação pertence a um Evento
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'eventos_id');
    }

    // Relacionamento: Uma Avaliação pertence a uma Classificação
    public function classificacao()
    {
        return $this->belongsTo(Classificacao::class, 'classificacoes_id');
    }

    // Relacionamento: Uma Avaliação tem muitas Respostas
    public function respostas()
    {
        return $this->hasMany(RespostaAvaliacao::class, 'avaliacoes_id');
    }

    // Relacionamento: Uma Avaliação tem um Plano de Mitigação
    public function planoMitigacao()
    {
        return $this->hasOne(PlanoMitigacao::class, 'avaliacoes_id');
    }
}