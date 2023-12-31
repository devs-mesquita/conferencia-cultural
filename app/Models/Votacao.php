<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votacao extends Model
{
    use HasFactory;

    protected $table = 'votacao';

    protected $fillable = [
        'cpf',
        'nome_voto',
        'id_inscricao',
    ];
}
