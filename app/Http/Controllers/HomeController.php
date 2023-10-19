<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscricao;
use App\Models\Votacao;
use App\Models\Gts;

class HomeController extends Controller
{
    public function index()
    {

        $qtd_total_delegado = ;
        $qtd_total_participante = ;
        $qtd_total_observador = ;
        $qtd_total_convidado = ;

        $qtd_delegado_apt = ;

        $qtd_total_inscricoes = ;

        $qtd_gt_1 = ;
        $qtd_gt_2 = ;
        $qtd_gt_3 = ;
        $qtd_gt_4 = ;
        $qtd_gt_5 = ;


        return view('pages.home');
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
       

        
        // $inscricao->foto                    =   $data[''];
        // $inscricao->comprovante_doccpf      =   $data[''];
        // $inscricao->comprovante_residencia  =   $data[''];

        
        // dd(request()->all());
    }
}
