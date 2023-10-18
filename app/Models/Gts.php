<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gts extends Model
{
    use HasFactory;

    protected $table = 'gts';

    protected $fillable = [
        'nome',
        'qtd',
        'color',
    ];
}
