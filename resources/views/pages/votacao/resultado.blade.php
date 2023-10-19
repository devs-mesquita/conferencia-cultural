@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])

    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Resultado da Votação</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">

                        @foreach ($resultado as $item)
                         
                            <div class="row col-md-12 px-3 py-1 mb-3">
                                
                                <div class="col-md-1" style="width: 5.333333%;">
                                    <div>
                                        <img src="{{url('storage',$item->foto)}}" class="avatar me-3" alt="image">
                                        
                                    </div>
                                </div>

                                <div class="col-md-11">
                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                          <div class="progress-percentage">
                                            <span class="text-sm font-weight-bold">Quantidade de Votos: {{$item->quantidade_votos}}</span>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div>
                                    <h6 class="mb-0 text-sm"> {{$item->nome_voto}}</h6>
                                </div>
                            </div>
                        @endforeach

                        
                       
                        



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
