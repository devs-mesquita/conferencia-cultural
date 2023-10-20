<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;

    protected $table = 'inscricao';

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'foto',
        'nascimento',
        'telefone',
        'tipo',
        'cep',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'municipio',
        'youtube',
        'instagram',
        'twitter',
        'linkedin',
        'pinterest',
        'gt',
        'doc_identidade',
        'doc_residencia',
        'doc_portifolio',
        'avaliado',
        'avaliador_id',
        'observacao',
    ];
}
