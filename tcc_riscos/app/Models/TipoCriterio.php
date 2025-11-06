<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCriterio extends Model
{
    use HasFactory;

    protected $table = 'tipo_criterios';

    protected $fillable = [
        'descricao',
        'valor',
        'criterios_id',
    ];

    // Relacionamento: Uma Opção (TipoCriterio) pertence a um Critério
    public function criterio()
    {
        return $this->belongsTo(Criterio::class, 'criterios_id');
    }
}