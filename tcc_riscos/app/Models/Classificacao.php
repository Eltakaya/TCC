<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classificacao extends Model
{
    use HasFactory;

    protected $table = 'classificacoes';

    protected $fillable = [
        'tipo_class',
        'intervalo_min',
        'intervalo_max',
        'acoes_recomendadas',
    ];
}