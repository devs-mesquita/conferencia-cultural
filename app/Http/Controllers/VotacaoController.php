<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscricao;

class VotacaoController extends Controller
{
    public function index()
    {

        $delegados = Inscricao::where('tipo','DELEGADO')->where('avaliado',1)->get();

        return view('pages.votacao.index', compact('delegados'));
    }
}
