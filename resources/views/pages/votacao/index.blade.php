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

    <div class="row col-md-12">
        @foreach ($delegados as $delegado)
            <div class="col-md-3" style="padding: 2% 2% 2% 2%">
                <div class="card" style="width: 80%;">
                    {{-- <img src="{{url($delegado->foto)}}" class="rounded-circle img-fluid border border-2 border-white"> --}}
                    <img src="{{asset('/img/team-2.jpg')}}" alt="">
                    <button>
                        VOTAR
                    </button>
                </div>
            </div>
        @endforeach
    </div>


</body>
</html>