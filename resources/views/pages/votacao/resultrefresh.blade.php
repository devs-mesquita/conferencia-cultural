<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/brasão.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/brasão.png') }}">
    <title>Cadastro de Conferencia Cultural</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    {{-- https://bootstrapr.io/bs3/web-fonts-fontawesome.html --}}

    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->

    <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet" />
    {{-- <link id="pagestyle" href="./assets/css/argon-dashboard.css" rel="stylesheet" /> --}}
</head>

<body>

    <nav class="navbar bg-light shadow-sm mb-3">
        <div class="container">
            <img id="logonav" src="https://sirvodec.mesquita.rj.gov.br/assets/logo.png" height="70vh"
                alt="Logotipo Prefeitura de Mesquita">
        </div>
        <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="autoRefreshCheckbox">
        </div>
    </nav>

    <div id="app">
        @include('flash-message')


        @yield('content')
    </div>

    <div class="container-fluid" style="width: 90%">
        <div class="card mb-5">
            <div class="card-header">
                <h6 class="text-center">APURAÇÃO DE VOTOS</h6>
                <hr class="horizontal dark my-3">
            </div>        
            <div class="card-body" style="padding: 0rem 1rem;mx-auto">
                <div class="row mt-4 mx-4 text-center">
                    <div class="col-12">
                        <div class="table-responsive p-0">

                            @foreach ($resultado as $item)
                                <div class="row col-md-12 px-3 py-1 mb-3">

                                    <div class="col-md-12" >
                                        <div>
                                            <img src="/storage/{{ $item->foto }}" class="avatar me-3" alt="image">

                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-sm"> {{ $item->nome_voto }}</h6>
                                        </div>
                                        <div class="progress-wrapper">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-sm font-weight-bold">Quantidade de Votos:
                                                        {{ $item->quantidade_votos }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script>
     let autoRefreshInterval; // Variável para armazenar o intervalo do auto refresh
    const checkbox = document.getElementById('autoRefreshCheckbox');

    function toggleAutoRefresh() {
        if (checkbox.checked) {
            // Se o checkbox estiver marcado, desative o auto refresh
            clearInterval(autoRefreshInterval);
            autoRefreshInterval = null;
        } else {
            // Se o checkbox não estiver marcado, ative o auto refresh
            autoRefreshInterval = setInterval(function () {
                location.reload(); // Recarrega a página
            }, 5000); // Intervalo de 5 segundos (ajuste conforme necessário)
        }
    }

    // Adiciona um ouvinte de evento ao checkbox
    checkbox.addEventListener('change', toggleAutoRefresh);

    // Verifica o estado inicial do checkbox e inicia o auto refresh se não estiver marcado
    if (!checkbox.checked) {
        toggleAutoRefresh();
    }
</script>


