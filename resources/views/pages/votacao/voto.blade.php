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

    {{-- <div class="container-fluid py-4"> --}}
    <div class="container-fluid">
        <div class="row">

            @foreach ($delegados as $delegado)
                <div class="col-xl-3 col-sm-3 mb-xl-0 mb-4">
                    <div class=" mt-4 mb-2">
                        <div class="row">
                            <div class="text-center rounded-circle img-fluid border-white">
                                <img src="/storage/{{$delegado->foto}}" class="rounded-circle img-fluid border border-1 border-white">
                            </div>
                            
                        </div>
                    </div>
                    <div class="text-center">
                        <div>
                            <h5 style="color:#bfa15f">{{$delegado->nome}}</h5>
                        </div>
                        <a
                            class="btn btn-primary btn-xs action botao_acao btn_votei"
                            data-nome="{{$delegado->nome}}" 
                            data-cpf="{{$cpf}}"
                            data-id_inscricao="{{$delegado->id}}"
                            data-toggle="tooltip" 
                            data-placement="bottom" 
                            title="Resetar Senha">  
                            Votar
                        </a>    
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    {{-- <form action="{{url('vota')}}" method="post">
        {{ csrf_field() }}
        <div class="row col-md-12">
            <!-- <input type="text" name="cpf" id="cpf" value="{{$cpf}}"> -->
            @foreach ($delegados as $delegado)
                <div class="col-md-3" style="padding: 2% 2% 2% 2%">
                    <div class="card rounded-circle img-fluid border border-2 border-white" style="width: 50%;">
                        <img src="/storage/{{$delegado->foto}}" class="rounded-circle img-fluid border border-2 border-white">
                    </div>
                    
                    <div class="col-12 text-center"  style="width: 50%;">
                        <div>
                            <h5 style="color:#bfa15f">{{$delegado->nome}}</h5>
                        </div>
                        <a
                            class="btn btn-primary btn-xs action botao_acao btn_email_senha"
                            data-info="{{$delegado->nome}}" 
                            data-toggle="tooltip" 
                            data-placement="bottom" 
                            title="Resetar Senha">  
                            Votar
                        </a>    
                    </div>
                </div>
            @endforeach
        </div>
    </form> --}}
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function(){
        $("body").on("click", "a.btn_votei", function(e){
            e.preventDefault();
            let nome = $(this).data('nome');
            let cpf = $(this).data('cpf');
            let id_inscricao = $(this).data('id_inscricao');
            // let mySound = new Audio('{{ asset("assets/songs/paola.mp3") }}')
            // let mySound = new Audio('{{ asset("assets/songs/iha.mp3") }}')
            let mySound = new Audio('{{ asset("assets/songs/urna.mp3") }}')
            // console.log(nome);
            // console.log(cpf);
            swal({
                title: "Atenção!",
					text: "Confirmação de voto em: "+nome,
					icon: "warning",
					buttons: {
					  cancel: {
						 text: "Cancelar",
						 value: "cancelar",
						 visible: true,
						 closeModal: true,
					  },
					  ok: {
						 text: "Sim, Confirmar!",
						 value: 'ok',
						 visible: true,
						 closeModal: true,
					  }
					}
            }).then(function(resultado){
                console.log("confirma");
                if(resultado === 'ok'){
                    $.post("{{url("/vota")}}",{
								cpf: cpf,
                                nome: nome,
                                id_inscricao: id_inscricao,
								_token: "{{ csrf_token()}}",
							}).done(function(){
                                swal({
                                    title: 'Concluido!',
                                    text: 'Seu voto foi adicionado com sucesso!',
                                    icon: 'success',
                                    buttons: [''],
                                    })
                                mySound.play()
                                setTimeout(() => {
                                    window.location.href = `{{url("/")}}/votacao`;
                                    // console.log("Delayed for 1 second.");
                                }, "2000");

					});
                }
            });
        });
    });
</script>
