<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscricao;
use Auth;

class InscricaoController extends Controller
{
    public function index()
    {

        $inscricoes = Inscricao::where('tipo','DELEGADO')->get();

        return view('pages.inscricao.index', compact('inscricoes'));
    }

    public function show($id)
    {

        $inscricao = Inscricao::find($id);

        return view('pages.inscricao.show', compact('inscricao'));
    }

    public function avalia(Request $request, $id)
    {
        // dd($request->all());

        $inscricao = Inscricao::find($id);

        $inscricao->avaliado = $request->avaliado;
        $inscricao->observacao = $request->observacao;
        $inscricao->avaliador_id = Auth::user()->id;

        $inscricao->save();

        return redirect('/inscricao');

    }

}
