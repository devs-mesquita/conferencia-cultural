<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Votação</title>
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

<body style="background-color: #342a54">

    <div class="d-flex justify-content-center">
            <img src="{{asset('img/brasão.png')}}" style="width: 17%;padding-top: 26px;padding-bottom: 19px;" alt="main_logo">
    </div>

   <div id="alert"></div>
    
    <div class="container-fluid" style="width: 50%">
        <div class="card mb-5">
            <div class="card-header">
                <h6 class="text-center">Para votar digite o CPF abaixo</h6>
                <hr class="horizontal dark my-3">
            </div>
            <div class="card-body" style="padding: 0rem 1rem">
                {{ csrf_field() }}
                <div class="pb-0 p-2">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">CPF</label>
                                <input class="form-control" type="tel" id="cpf" name="cpf" required>
                            </div>
                            <button id="procura" class="btn bg-gradient-success mb-3">Entrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/vanillaMasker.min.js') }}"></script>
<script>
    VMasker($("#cpf")).maskPattern("999.999.999-99");

    $(document).ready(function() {
        $("button#procura").click(function(event) {
            var cpf = document.getElementById("cpf").value;

            var query = "{{ url('/') }}/checacpfexiste/" + cpf;

            $.ajax({
                url: query,
                success: function(data) {
                    if (data.resultado == 'existe_voto') {
                        document.getElementById('alert').innerHTML = "<div id='sera' class='alert alert-warning alert-dismissible fade show' role='alert'><span class='alert-icon'></span><span class='alert-text'><strong>Alerta! </strong> VOCÊ JA VOTOU</span></div>";
                        const a = document.getElementById('sera');
                        setTimeout(() => {
                            a.remove();
                        }, "3000");
                        // console.log('Ja votou');
                    } else if (data.resultado == 'nao_registrado') {
                        document.getElementById('alert').innerHTML = "<div id='sera' class='alert alert-warning alert-dismissible fade show' role='alert'><span class='alert-icon'></span><span class='alert-text'><strong>Alerta! </strong> CPF NÃO ENCONTRADO EM NOSSOS REGISTROS</span></div>";
                        const a = document.getElementById('sera');
                        setTimeout(() => {
                            a.remove();
                        }, "3000");
                        // console.log('Não foi Registrado');
                    } else {
                        window.location.href = `{{ url('/') }}/meuvoto/${cpf}`;
                    }
                }
            });
        });
    });
</script>
