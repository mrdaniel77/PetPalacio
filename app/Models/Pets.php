<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clientes;
use App\Models\Agendamento;

class Pets extends Model
{
    use HasFactory;

    protected $table = 'pets';

    protected $fillable = [
        'nome', 
        'raca', 
        'peso',
        'observacao',
        'cliente_id'
    ];

    public function cliente(){
        return $this->belongsTo(Clientes::class);
    }

    public function agendamento(){
        return $this->hasOne(Agendamento::class, 'pet_id');
    }
}
