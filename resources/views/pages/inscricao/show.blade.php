@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid px-2">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 mb-lg-0 mb-4">
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Inscrição Detalhada</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                
                                <img style="
                                width: 197px;
                                height: 145px;
                            " src="{{url($inscricao->foto)}}" alt="">

                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-12 col-md-4"><span><b>Nome: {{$inscricao->nome}}</b></span></div>
                                        <div class="col-12 col-md-4"><span><b>CPF: {{$inscricao->cpf}}</b></span></div>
                                        <div class="col-12 col-md-4"><span><b>Telefone: {{$inscricao->telefone}}</b></span></div>
                                      </div>
                                        <br>
                                      <div class="row">
                                        <div class="col-12 col-md-4"><span><b>Email: {{$inscricao->email}}</b></span></div>
                                        <div class="col-12 col-md-8"><span><b>GT: {{$inscricao->gt}}</b></span></div>
                                      </div>
                                        <br>
                                      <div class="row">
                                        <div class="col-12 col-md-4"><span><b>CEP: {{$inscricao->cep}}</b></span></div>
                                        <div class="col-12 col-md-4"><span><b>Rua: {{$inscricao->rua}}</b></span></div>
                                        <div class="col-12 col-md-4"><span><b>Municipio: {{$inscricao->municipio}}</b></span></div>
                                        <div class="col-12 col-md-4"><span><b>Bairro: {{$inscricao->bairro}}</b></span></div>
                                        <div class="col-12 col-md-4"><span><b>Numero: {{$inscricao->numero}}</b></span></div>
                                      </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-12 col-md-4"><span><b>youtube: {{$inscricao->youtube}}</b></span></div>
                                            <div class="col-12 col-md-4"><span><b>instagram: {{$inscricao->instagram}}</b></span></div>
                                            <div class="col-12 col-md-4"><span><b>twitter: {{$inscricao->twitter}}</b></span></div>
                                            <div class="col-12 col-md-4"><span><b>linkedin: {{$inscricao->linkedin}}</b></span></div>
                                            <div class="col-12 col-md-4"><span><b>pinterest: {{$inscricao->pinterest}}</b></span></div>
                                          </div>
                                        <br>
                                      <div class="row">
                                        @if (isset($inscricao->doc_identidade))
                                            <div class="col-12 col-md-12"><span><b>Documento de Identidade: <a href="{{url($inscricao->doc_identidade)}}" target="_blank">Documento de Identidade</a></b></span></div>    
                                        @endif
                                        @if (isset($inscricao->doc_residencia))
                                            <div class="col-12 col-md-12"><span><b>Comprovante de Residencia:  <a href="{{url($inscricao->doc_residencia)}}">Comprovante de Residencia</a></b></span></div>
                                        @endif
                                        @if (isset($inscricao->doc_portifolio))
                                            <div class="col-12 col-md-12"><span><b>Portifolio:  <a href="{{url($inscricao->doc_portifolio)}}">Portifolio</a></b></span></div> 
                                        @endif
                                        
                                        
                                        
                                      </div>
                                </div>

                                @if ($inscricao->avaliado == 0)
                                    <form action="{{url("inscricao/$inscricao->id/avalia")}}" method="post">
                                        {!! method_field('PUT') !!}
                                            {{ csrf_field() }}
                                            <div class="col-12 text-center">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="example-text-input" class="form-control-label">
                                                            <input type="radio" name="avaliado" value="1" required> <b>APROVAR</b>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="example-text-input" class="form-control-label">
                                                            <input type="radio" name="avaliado" value="2"> <b>RECUSAR</b>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="pb-0 p-2">
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <button type="submit" id="btn_salvar" class="btn bg-gradient-success mb-3">Salvar</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                @elseif($inscricao->avaliado == 1)
                                    <div class="col-12 text-center">
                                        CONFIRMADO    
                                    </div>
                                @else
                                    <div class="col-12 text-center">
                                        RECUSADO    
                                    </div>
                                @endif
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection

@push('js')

@endpush
