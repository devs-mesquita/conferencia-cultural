<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 text-center mb-0" href="{{ route('home') }}">
            <img src="{{asset('img/brasão.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold  " style="color: #bfa15f;">SEMCELT</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-fw fa-home text-dark text-sm opacity-10" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'votacao' ? 'active' : '' }}" href="{{ route('votacao.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-fw fa-commenting text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Votação</span>
                    </a>
                </li> --}}

                    @if (Auth::user()->nivel == 'Avaliador')
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'inscricao.index' ? 'active' : '' }}" href="{{ route('inscricao.index') }}">
                                <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Inscrição</span>
                            </a>
                        </li>

                    @endif

                    @if (Auth::user()->nivel == 'Cadastrador')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/form') }}">
                                <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Formulario</span>
                            </a>
                        </li>

                    @endif

                    @if (Auth::user()->nivel == 'Super-Admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/form') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Formulario</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'inscricao.index' ? 'active' : '' }}" href="{{ route('inscricao.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Inscrição</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'home.resultado' ? 'active' : '' }}" href="{{ route('resultado') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-fw fa-bars text-dark text-sm opacity-10" aria-hidden="true"></i>
                            </div>
                            <span class="nav-link-text ms-1">Resultado</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'export.index' ? 'active' : '' }}" href="{{ route('export.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-fw fa-bars text-dark text-sm opacity-10" aria-hidden="true"></i>
                            </div>
                            <span class="nav-link-text ms-1">Exportar</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'user.index' ? 'active' : '' }}" href="{{ route('user.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Usuarios</span>
                        </a>
                    </li>
                    @endif
                

            </ul>
        </div>
</aside>
