<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoMitigacao extends Model
{
    use HasFactory;

    protected $table = 'planos_mitigacao';

    protected $fillable = [
        'descricao',
        'data_criacao',
        'avaliacoes_id',
    ];

    // Relacionamento: Um Plano pertence a uma Avaliação
    public function avaliacao()
    {
        return $this->belongsTo(Avaliacao::class, 'avaliacoes_id');
    }
}