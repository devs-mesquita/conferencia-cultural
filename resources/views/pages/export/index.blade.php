@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
 
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 mb-lg-0 mb-4">
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row mb-4">
                                <div class="col-4 d-flex align-items-center">
                                    {{-- <a class="btn bg-gradient-dark mb-0" href="{{ url('export/confirmados')}}"> Exportar Confirmados</a> --}}
                                    <a class="btn bg-gradient-dark mb-0" href="{{ route('confirmados')}}"> Exportar Confirmados</a>
                                    
                                </div>
                                <div class="col-4 d-flex align-items-center">
                                    <a class="btn bg-gradient-dark mb-0" href="{{ route('recusados')}}"> Exportar Recusados</a>
                                </div>
                                <div class="col-4 d-flex align-items-center">
                                    <a class="btn bg-gradient-dark mb-0" href="{{ route('votacaofinal')}}"> Resultado Votação</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 d-flex align-items-center">
                                    <a class="btn bg-gradient-dark mb-0" href="{{ route('todasinscricoes')}}"> Resultado Total de Inscrição</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                


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
