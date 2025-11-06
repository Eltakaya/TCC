<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    use HasFactory;

    protected $table = 'criterios';

    protected $fillable = [
        'descricao',
        'peso',
        'tipo_riscos_id',
    ];

    // Relacionamento: Um Critério pertence a um Tipo de Risco
    public function tipoRisco()
    {
        return $this->belongsTo(TipoRisco::class, 'tipo_riscos_id');
    }

    // Relacionamento: Um Critério tem muitas Opções (TipoCriterio)
    public function tipoCriterios()
    {
        return $this->hasMany(TipoCriterio::class, 'criterios_id');
    }
}