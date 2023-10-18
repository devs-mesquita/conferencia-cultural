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
    </nav>

    <div id="app">
		@include('flash-message')


		@yield('content')
	</div>

    <div class="container-fluid" style="width: 80%">
        <div class="card mb-5">
            <div class="card-header">
                <h6 class="text-center">Novo Cadastro</h6>
                <hr class="horizontal dark my-3">
            </div>
            <div class="card-body" style="padding: 0rem 1rem">
                <form action="{{url('formsave')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h5 class="text-uppercase">Dados Iniciais</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* Nome</label>
                                <input class="form-control" type="text" name="nome" 
                                required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* Email</label>
                                <input class="form-control" type="email" name="email" required>
                                {{-- <p class="text-xs">You cannot change the email in the demo version</p> --}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* Data de Nascimento</label>
                                <input class="form-control" type="date" name="nascimento" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* CPF</label>
                                <input class="form-control" type="text" name="cpf" id="cpf" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* Telefone</label>
                                <input class="form-control" type="text" name="telefone" id="telefone">
                            </div>
                        </div>
                    </div>

                    <h5 class="text-uppercase">endereço</h5>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* CEP</label>
                                <input class="form-control" type="text" name="cep" id="cep" onblur="pesquisacep(this.value);" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* Rua</label>
                                <input class="form-control" type="text" name="rua" id="rua" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* Municipio</label>
                                <input class="form-control" type="text" name="municipio" id="municipio" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* Bairro</label>
                                <input class="form-control" type="text" name="bairro" id="bairro" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Numero</label>
                                <input class="form-control" type="text" name="numero" name="numero" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Complemento</label>
                                <input class="form-control" type="text" name="complemento">
                            </div>
                        </div>
                        
                    </div>

                    <h5 class="text-uppercase">GT</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-select-input" >* Grupo de Trabalho</label>
                                <select class="form-select" name="gt" id="gt" onchange="selecionarGT()" required>
                                    <option value=""></option>
                                    @foreach ($gts as $gt)
                                        <option style="color:{{$gt->color}}" value="{{$gt->id}}/{{$gt->nome}}">{{$gt->nome}} / Quantidade de Vagas: {{$gt->qtd}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                 

                    <h5 class="text-uppercase">opção de participação</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="example-text-input" class="form-control-label">
                                <input type="radio" name="tipo" value="DELEGADO" required> <b>Candidato a Delegado</b>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label for="example-text-input" class="form-control-label">
                                <input type="radio" name="tipo" value="PARTICIPANTE"> <b>Participante</b>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label for="example-text-input" class="form-control-label">
                                <input type="radio" name="tipo" value="CONVIDADO"> <b>Convidado</b>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label for="example-text-input" class="form-control-label">
                                <input type="radio" name="tipo" value="OBSERVADOR"> <b>Observador</b>
                            </label>
                        </div>
                    </div>
                    <br>
                    <h5 class="text-uppercase">redes sociais</h5>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Youtube</label>
                                <input class="form-control" type="text" name="youtube">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Instagram</label>
                                <input class="form-control" type="text" name="instagram">
                                {{-- <p class="text-xs">You cannot change the email in the demo version</p> --}}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Twitter</label>
                                <input class="form-control" type="text" name="twitter">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Linkedin</label>
                                <input class="form-control" type="text" name="linkedin">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Pinterest</label>
                                <input class="form-control" type="text" name="pinterest">
                            </div>
                        </div>
                    </div>

                    <h5 class="text-uppercase">Arquivos</h5>
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <p><span id="errorMsg"></span></p>
        
                                <!-- Stream video via webcam -->
                                <div class="video-wrap" hidden>
                                    <video id="video" playsinline autoplay></video>
                                </div>
                            
                                <!-- Trigger canvas web API -->
                                <div class="controller">
                                    <a id="snap"><i class="fa fa-camera" style="font-size: 40px; padding-right: 7px" aria-hidden="true"></i></a>
                                </div>
                            
                                <!-- Webcam video snapshot -->
                                <canvas id="canvas" width="300" height="300"></canvas>
                            
                                <!-- Input file para armazenar a imagem -->
                                <input name="foto" type="file" accept="image/*" id="fileInput" style="display: none;" required>  
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="row">
                                <div class="d-flex">
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                        <div class="col-12 mt-3">
                                            <label class="form-label fw-normal">Documento com Foto e CPF:
                                            </label>
                                            <p class="mb-3">
                                                 <label for="comprovante_doccpf">
                                                      <a class="btn btn-primary text-light" type="button" role="button" aria-disabled="false">Adicionar Arquivo</a>
                                                 </label>
                                                 <input id="comprovante_doccpf" class="form-control" name="comprovante_doccpf" type="file"  style="visibility: hidden; position: absolute;" accept=".pdf,.jpeg,.png,.jpg">
                                            </p>
                                            <div id="erro-doccpf" class="alert alert-danger mb-2" style="display: none;">
                                                <p class="m-0">Tipo de arquivo inválido, insira pdf, jpg, jpeg ou png</p>
                                            </div>
                                            <div id="erro-doccpf-grande" class="alert alert-danger mb-2" style="display: none;">
                                                <p class="m-0">Arquivo ultrapassa o limite de tamanho permitido</p>
                                            </div>
                                            <p id="doccpf-vermelho" style="font-size: 13px; color: red; display: none;" class="mb-2">* Atenção: Os arquivos destacados em vermelho não serão enviados.</p>
                                            <p id="doccpfs-area">
                                                <span id="comprova_doccpf"></span>
                                            </p>
                                      </div>
                                    </div>
        
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                        <div class="col-12 mt-3">
                                            <label class="form-label fw-normal">Comprovante de Residencia:
                                            </label>
                                            <p class="mb-3">
                                                 <label for="comprovante_residencia">
                                                      <a class="btn btn-primary text-light" type="button" role="button" aria-disabled="false">Adicionar Arquivo</a>
                                                 </label>
                                                 <input id="comprovante_residencia" class="form-control" name="comprovante_residencia" type="file"  style="visibility: hidden; position: absolute;" accept=".pdf,.jpeg,.png,.jpg">
                                            </p>
                                            <div id="erro-residencia" class="alert alert-danger mb-2" style="display: none;">
                                                <p class="m-0">Tipo de arquivo inválido, insira pdf, jpg, jpeg ou png</p>
                                            </div>
                                            <div id="erro-residencia-grande" class="alert alert-danger mb-2" style="display: none;">
                                                <p class="m-0">Arquivo ultrapassa o limite de tamanho permitido</p>
                                            </div>
                                            <p id="residencia-vermelho" style="font-size: 13px; color: red; display: none;" class="mb-2">* Atenção: Os arquivos destacados em vermelho não serão enviados.</p>
                                            <p id="residencias-area">
                                                <span id="comprova_residencia"></span>
                                            </p>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-flex">
                                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                        <div class="col-12 mt-3">
                                            <label class="form-label fw-normal">Portifolio:
                                            </label>
                                            <p class="mb-3">
                                                 <label for="comprovante_portifolio">
                                                      <a class="btn btn-primary text-light" type="button" role="button" aria-disabled="false">Adicionar Arquivo</a>
                                                 </label>
                                                 <input id="comprovante_portifolio" class="form-control" name="comprovante_portifolio" type="file"  style="visibility: hidden; position: absolute;" accept=".pdf,.jpeg,.png,.jpg">
                                            </p>
                                            <div id="erro-portifolio" class="alert alert-danger mb-2" style="display: none;">
                                                <p class="m-0">Tipo de arquivo inválido, insira pdf, jpg, jpeg ou png</p>
                                            </div>
                                            <div id="erro-portifolio-grande" class="alert alert-danger mb-2" style="display: none;">
                                                <p class="m-0">Arquivo ultrapassa o limite de tamanho permitido</p>
                                            </div>
                                            <p id="portifolio-vermelho" style="font-size: 13px; color: red; display: none;" class="mb-2">* Atenção: Os arquivos destacados em vermelho não serão enviados.</p>
                                            <p id="portifolios-area">
                                                <span id="comprova_portifolio"></span>
                                            </p>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </li>
                  

                    <div class="pb-0 p-2">
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" id="btn_salvar" class="btn bg-gradient-success mb-3">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/vanillaMasker.min.js')}}"></script>
<script>
    VMasker($("#cpf")).maskPattern("999.999.999-99");
    VMasker($("#telefone")).maskPattern("(99)99999-9999");
    VMasker($("#cep")).maskPattern("99999-999");
</script>
<script>
   function selecionarGT() {
        // Obter o elemento select
        var select = document.getElementById("gt");

        // Obter a opção selecionada
        var selectedOption = select.options[select.selectedIndex];

        // Obter o valor da propriedade 'color' da opção selecionada
        var color = selectedOption.style.color;

        // Aplicar o valor ao estilo do elemento select acima
        document.getElementById("gt").style.color = color;
    }
</script>
<script>
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const snap = document.getElementById("snap");
const errorMsgElement = document.querySelector('span#errorMsg');
const fileInput = document.getElementById('fileInput');

const constraints = {
    video: {
        width: 300, height: 300
    }
};

// Access webcam
async function init() {
    try {
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        handleSuccess(stream);
    } catch (e) {
        errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
    }
}

// Success
function handleSuccess(stream) {
    window.stream = stream;
    video.srcObject = stream;
}

// Load init
init();

// Draw image
var context = canvas.getContext('2d');
snap.addEventListener("click", function() {
    event.preventDefault();
    context.drawImage(video, 0, 0, 300, 300);

    // Convert canvas to data URL
    const dataUrl = canvas.toDataURL('image/jpeg');
    
    // Convert data URL to Blob
    const blob = dataURItoBlob(dataUrl);

    // Create a File object from the Blob
    const file = new File([blob], 'snapshot.jpg', { type: 'image/jpeg' });

    console.log(file);

    // Create a new DataTransfer object
    const dataTransfer = new DataTransfer();

    // Add the File object to the DataTransfer object
    dataTransfer.items.add(file);

    // Set the DataTransfer object to the input file
    fileInput.files = dataTransfer.files;
});

// Convert data URI to Blob
function dataURItoBlob(dataURI) {
    const byteString = atob(dataURI.split(',')[1]);
    const ab = new ArrayBuffer(byteString.length);
    const ia = new Uint8Array(ab);
    for (let i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
    }
    return new Blob([ab], { type: 'image/jpeg' });
}

// Open file input when clicking on the canvas
canvas.addEventListener('click', function() {
    fileInput.click();
});
</script>

<script>

    function limpa_formulário_cep() {
				//Limpa valores do formulário de cep.
				document.getElementById('rua').value=("");
				document.getElementById('bairro').value=("");
				document.getElementById('municipio').value=("");
		}

    function meu_callback(conteudo) {
	    if (!("erro" in conteudo)) {
			//Atualiza os campos com os valores.
			document.getElementById('rua').value=(conteudo.logradouro);
			document.getElementById('bairro').value=(conteudo.bairro);
			document.getElementById('municipio').value=(conteudo.localidade);
		} //end if.
			else {
				//CEP não Encontrado.
				limpa_formulário_cep();
				alert("CEP não encontrado.");
			}
		}

    function pesquisacep(valor) {

			//Nova variável "cep" somente com dígitos.
			var cep = valor.replace(/\D/g, '');

			//Verifica se campo cep possui valor informado.
			if (cep != "") {

				//Expressão regular para validar o CEP.
				var validacep = /^[0-9]{8}$/;

				//Valida o formato do CEP.
				if(validacep.test(cep)) {

					//Preenche os campos com "..." enquanto consulta webservice.
					document.getElementById('rua').value="...";
					document.getElementById('bairro').value="...";
                    document.getElementById('municipio').value="...";

					//Cria um elemento javascript.
					var script = document.createElement('script');

					//Sincroniza com o callback.
					script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

					//Insere script no documento e carrega o conteúdo.
					document.body.appendChild(script);

				} //end if.
				else {
					//cep é inválido.
					limpa_formulário_cep();
					alert("Formato de CEP inválido.");
				}
			} //end if.
			else {
				//cep sem valor
				limpa_formulário_cep();
			}
		};
</script>
<script>
    const residenciaInput = document.querySelector('#comprovante_residencia');

    //attaching "change" event to the file upload button
    residenciaInput.addEventListener("change", function(e){
       const allowedExtensions =  ['pdf','PDF','jpeg','png','jpg'],
                tamanhoMaximo = 10000000; // 10 megabyte

       // destructuring file name and size from file object
       const { name:fileName, size:fileSize } = this.files[0];

       const fileExtension = fileName.split(".").pop();
    
       document.querySelector('#comprova_residencia').remove();
       $('#residencias-area').append('<tr id="comprova_residencia"><td> <span id="filenameresidencia" style="color:green">'+fileName+'</span> </td></tr>');
       document.querySelector('#erro-residencia').style.display = "none";

       if(!allowedExtensions.includes(fileExtension)){
          // alert("file type not allowed");
          document.querySelector('#erro-residencia').style.display = "block";
          document.querySelector('#filenameresidencia').style.color = "red";
          this.value = null;
       }else if(fileSize > tamanhoMaximo){
          document.querySelector('#erro-residencia-grande').style.display = "block";
          this.value = null;
       }
    });

    const doccpfInput = document.querySelector('#comprovante_doccpf');

   //attaching "change" event to the file upload button
   doccpfInput.addEventListener("change", function(e){
      const allowedExtensions =  ['pdf','PDF','jpeg','png','jpg'],
               tamanhoMaximo = 10000000; // 10 megabyte

      // destructuring file name and size from file object
      const { name:fileName, size:fileSize } = this.files[0];

      const fileExtension = fileName.split(".").pop();
      
      document.querySelector('#comprova_doccpf').remove();
      $('#doccpfs-area').append('<tr id="comprova_doccpf"><td> <span id="filenamedoccpf" style="color:green">'+fileName+'</span> </td></tr>');
      document.querySelector('#erro-doccpf').style.display = "none";

      if(!allowedExtensions.includes(fileExtension)){
         // alert("file type not allowed");
         document.querySelector('#erro-doccpf').style.display = "block";
         document.querySelector('#filenamedoccpf').style.color = "red";
         this.value = null;
      }else if(fileSize > tamanhoMaximo){
         document.querySelector('#erro-doccpf-grande').style.display = "block";
         this.value = null;
      }
   });

   const portifolioInput = document.querySelector('#comprovante_portifolio');

    //attaching "change" event to the file upload button
    portifolioInput.addEventListener("change", function(e){
       const allowedExtensions =  ['pdf','PDF','jpeg','png','jpg'],
                tamanhoMaximo = 10000000; // 10 megabyte

       // destructuring file name and size from file object
       const { name:fileName, size:fileSize } = this.files[0];

       const fileExtension = fileName.split(".").pop();
    
       document.querySelector('#comprova_portifolio').remove();
       $('#portifolios-area').append('<tr id="comprova_portifolio"><td> <span id="filenameportifolio" style="color:green">'+fileName+'</span> </td></tr>');
       document.querySelector('#erro-portifolio').style.display = "none";

       if(!allowedExtensions.includes(fileExtension)){
          // alert("file type not allowed");
          document.querySelector('#erro-portifolio').style.display = "block";
          document.querySelector('#filenameportifolio').style.color = "red";
          this.value = null;
       }else if(fileSize > tamanhoMaximo){
          document.querySelector('#erro-portifolio-grande').style.display = "block";
          this.value = null;
       }
    });
</script>
