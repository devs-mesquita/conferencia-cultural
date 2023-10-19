<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Inscricao;
use App\Models\Votacao;
use App\Models\Gts;

class HomeController extends Controller
{
    public function index()
    {

        $qtd_total_delegado = DB::table('inscricao')->where('tipo','DELEGADO')->count();
        $qtd_total_participante = DB::table('inscricao')->where('tipo','PARTICIPANTE')->count();
        $qtd_total_observador = DB::table('inscricao')->where('tipo','OBSERVADOR')->count();
        $qtd_total_convidado = DB::table('inscricao')->where('tipo','CONVIDADO')->count();

        $qtd_delegado_apt = DB::table('inscricao')->where('tipo','DELEGADO')->where('avaliado',1)->count();

        $qtd_total_inscricoes = DB::table('inscricao')->count();

        $qtd_gt_1 = DB::table('inscricao')->where('gt','GT 1. Institucionalização, Marcos Legais e Sistema Nacional de Cultura')->count();
        $qtd_gt_2 = DB::table('inscricao')->where('gt','GT 2. Democratização do Acesso à Cultura e Participação Social')->count();
        $qtd_gt_3 = DB::table('inscricao')->where('gt','GT 3. Identidade, Patrimônio, Memória, Direito às Artes e Linguagens Digitais')->count();
        $qtd_gt_4 = DB::table('inscricao')->where('gt','GT 4. Diversidade Cultural e Transversalidade de Gênero, Raça e Acessibilidade na Política Cultural')->count();
        $qtd_gt_5 = DB::table('inscricao')->where('gt','GT 5. Economia Criativa, Trabalho, Renda e Sustentabilidade')->count();
        
        // dd($qtd_gt_3);
    
        return view('pages.home', compact('qtd_total_delegado','qtd_total_participante','qtd_total_observador','qtd_total_convidado','qtd_delegado_apt','qtd_total_inscricoes','qtd_gt_1','qtd_gt_2','qtd_gt_3','qtd_gt_4','qtd_gt_5'));
    }

    public function formulario()
    {

        $gts = Gts::all();

        return view('pages.formulario.create', compact('gts'));
    }

    public function formsave(Request $request)
    {
        // dd(request()->all());
        $data = $request->all();

        $checa_inscricao = Inscricao::where('cpf',$data['cpf'])->get();

        if(count($checa_inscricao) > 0){
            return back()->withInput()->with('error', 'Falha ao realizar inscrição, Esse CPF ja existe em nossa base de dados.');
        }else{

            $id_valor = explode('/', $request->gt); //[0] = id , [1] = valor
            // dd($id_valor);


            $inscricao = new Inscricao;

            $inscricao->nome        =   $data['nome'];
            $inscricao->email       =   $data['email'];
            $inscricao->nascimento  =   $data['nascimento'];
            $inscricao->cpf         =   $data['cpf'];
            $inscricao->telefone    =   $data['telefone'];
            $inscricao->cep         =   $data['cep'];
            $inscricao->rua         =   $data['rua'];
            $inscricao->municipio   =   $data['municipio'];
            $inscricao->bairro      =   $data['bairro'];
            $inscricao->numero      =   $data['numero'];
            $inscricao->complemento =   $data['complemento'];
            $inscricao->tipo        =   $data['tipo'];
            $inscricao->youtube     =   $data['youtube'];
            $inscricao->instagram   =   $data['instagram'];
            $inscricao->twitter     =   $data['twitter'];
            $inscricao->linkedin    =   $data['linkedin'];
            $inscricao->pinterest   =   $data['pinterest'];
            $inscricao->gt          =   $id_valor[1];


            if(isset($data['comprovante_residencia'])){
                $comprovante_residencia = request()->file('comprovante_residencia');
                $up_residencia = $comprovante_residencia->store('public/uploadsComprovanteResidencia');
                $inscricao->doc_residencia =  substr($up_residencia, 6);
            }
           
            if(isset($data['comprovante_doccpf'])){
                $comprovante_doccpf = request()->file('comprovante_doccpf');
                $up_doccpf = $comprovante_doccpf->store('public/uploadsDocCpf');
                $inscricao->doc_identidade = substr($up_doccpf, 6);
            }

            if(isset($data['comprovante_portifolio'])){
                $comprovante_portifolio = request()->file('comprovante_portifolio');
                $up_portifolio = $comprovante_portifolio->store('public/uploadsPortifolio');
                $inscricao->doc_portifolio = substr($up_portifolio, 6);
            }
    
            $imagem = request()->file('foto');
            $up_foto = $imagem->store('public/uploadsFoto');
            $inscricao->foto = substr($up_foto, 6);

            $inscricao->save();

            if($data['tipo'] == "DELEGADO" || $data['tipo'] == "PARTICIPANTE"){
                $gt = Gts::find($id_valor[0]);
                
                $dimunui = $gt->qtd - 1;
    
                $gt->qtd = $dimunui;
    
                $gt->save();
            }
    
            
            return redirect('/form');
        }
    }


    public function resultado()
    {

        // $resultado = DB::table('votacao as v')
        //             ->select(
        //                 'v.nome_voto',
        //                 DB::raw('COUNT(v.nome_voto) as quantidade_votos'),
        //                 DB::raw('(SELECT COUNT(*) FROM inscricao WHERE tipo = "DELEGADO" AND avaliado = 1) as total_delegados'),
        //                 DB::raw('COUNT(v.nome_voto) / (SELECT COUNT(*) FROM inscricao WHERE tipo = "DELEGADO" AND avaliado = 1) * 100 as porcentagem_votos')
        //             )
        //             ->groupBy('v.nome_voto')
        //             ->orderByDesc('quantidade_votos')
        //             ->get();


                    $resultado = DB::table('votacao as v')
                    ->select(
                        'v.nome_voto',
                        DB::raw('COUNT(v.nome_voto) as quantidade_votos'),
                        'i.foto'
                    )
                    ->leftJoin('inscricao as i', 'v.nome_voto', '=', 'i.nome')
                    ->groupBy('v.nome_voto', 'i.foto')
                    ->orderByDesc('quantidade_votos')
                    ->get();
                


// dd($resultado);
        return view('pages.votacao.resultado',compact('resultado'));
    }
}
