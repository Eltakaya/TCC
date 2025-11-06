<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'user_id',
        'nome',
        'data_inicio',
        'data_fim',
        'local',
    ];

    // Relacionamento: Um Evento pertence a um Usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento: Um Evento tem muitas Avaliações
    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class);
    }
}