<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pets;
use App\Models\Agendamento;

class Clientes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 
        'cpf', 
        'telefone',
        'email',
        'observacao',
        'foto'
    ];

    public function pet(){
        return $this->hasMany(Pets::class, 'cliente_id');
    }

    public function agendamento(){
        return $this->hasMany(Agendamentos::class, 'cliente_id');
    }
}
