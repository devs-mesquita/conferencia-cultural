@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css"> 
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 mb-lg-0 mb-4">
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Validação de Candidatos a Delegado</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                
                                <table id="myTable" class="display">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Data de Nascimento</th>
                                            <th>Municipio</th>
                                            <th>Avaliação</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inscricoes as $inscricao)
                                            <tr>
                                                <td>{{$inscricao->nome}}</td>
                                                <td>{{ date("d/m/Y", strtotime($inscricao->nascimento)) }}</td>
                                                <td>{{$inscricao->municipio}}</td>
                                                <td>
                                                    @if ($inscricao->avaliado == 0)
                                                        <h6 style="color: grey"><b hidden>a</b>NÃO AVALIADO</h6> 
                                                    @elseif($inscricao->avaliado == 1)
                                                        <h6 style="color: green">CONFIRMADO</h6> 
                                                        
                                                    @else
                                                        <h6 style="color: red">RECUSADO</h6> 
                                                        
                                                    @endif
                                                </td>
                                                <td>
                                                    <a
                                                        id="btn_vizualiza_usuario"
                                                        href="{{ route('inscricao.show', ['inscricao' => $inscricao->id]) }}"
                                                        title="Vizualizar Inscrição">  
                                                        <i class="fa fa-fw fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                    {{-- <a 
                                                        href="{{ action('App\Http\Controllers\NotificacaoController@imprimir', [$inscricao->id]) }}"
                                                        data-toggle="tooltip" data-placement="bottom" title="Imprimir Notificação">
                                                        <i class="fa fa-fw fa-print" aria-hidden="true"></i>	
                                                    </a>  --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection

@push('js')
<script src="assets/js/jquery.dataTables.min.js"></script>
<script>
    var myTable = $("#myTable").DataTable({
        language: {
            'url' : '{{ asset('assets/js/portugues.json') }}',
			"decimal": ",",
			"thousands": "."
        },
        order: [[3, 'asc']],
        // stateSave: true,
        stateDuration: -1,
        responsive: true,
    })
</script>
@endpush
