<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscricao;
use App\Models\Votacao;

class VotacaoController extends Controller
{
    public function index()
    {

        // $delegados = Inscricao::where('tipo','DELEGADO')->where('avaliado',1)->get();

        // return view('pages.votacao.index', compact('delegados'));
        return view('pages.votacao.index');
    }

    public function checacpfexiste($cpf)
    {

        // 'OBSERVADOR','PARTICIPANTE','DELEGADO','CONVIDADO'
        $checaexiste = Inscricao::where('tipo','!=', 'OBSERVADOR')->where('cpf',$cpf)->get();

        if(count($checaexiste) > 0){
            $checavotoexiste = Votacao::where('cpf',$cpf)->get();

            if(count($checavotoexiste) > 0){
                return response()->json(['resultado' => 'existe_voto' ]);
            }else{
                return response()->json(['resultado' => 'continua' ]);
            }
        }else{
            return response()->json(['resultado' => 'nao_registrado' ]);
        }
    }


    public function meuvoto($cpf)
    {
        $delegados = Inscricao::where('tipo','DELEGADO')->where('avaliado',1)->get();

        $meu_cpf = $cpf;
        // return view('pages.votacao.index', compact('delegados'));
        return view('pages.votacao.voto', compact('delegados','cpf'));
    }


    public function vota(Request $request)
    {
        // dd($request->all());
        $voto = new Votacao;

        $voto->cpf          = $request['cpf'];
        $voto->nome_voto    = $request['nome'];
        $voto->id_inscricao = $request['id_inscricao'];

        $voto->save();
    }
}
