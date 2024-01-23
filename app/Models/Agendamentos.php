<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clientes;
use App\Models\Pets;
use App\Models\Servicos;

class Agendamentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'pet_id',
        'servico_id',
        'data_agendamento',
        'horario_agendamento',
        'observacao_agendamento'
    ];

    public function cliente(){
        return $this->belongsTo(Clientes::class);
    }

    public function servicos(){
        return $this->belongsToMany(Servicos::class);
    }

    public function pet(){
        return $this->belongsTo(Pets::class);
    }

}
