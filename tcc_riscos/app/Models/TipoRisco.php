<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoRisco extends Model
{
    use HasFactory;

    protected $table = 'tipo_riscos';

    protected $fillable = ['risco'];

    // Relacionamento: Um Tipo de Risco tem muitos Critérios
    public function criterios()
    {
        // Nós precisamos dizer ao Laravel o nome exato da nossa chave estrangeira
        return $this->hasMany(Criterio::class, 'tipo_riscos_id');
    }
}