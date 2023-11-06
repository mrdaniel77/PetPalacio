<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany(Pets::class);
    }
}
