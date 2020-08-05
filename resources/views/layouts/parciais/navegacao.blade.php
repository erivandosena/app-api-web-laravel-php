
<div class="collapse bg-inverse" id="navbarHeader">
    <div class="container">
        <div class="row">
            @guest
                <!-- usuaario deslogado -->
                <div class="col-sm-8 py-4">
                    <h4 class="text-white">Sobre a plataforma GEES</h4>
                    <p class="text-muted">O gerenciamento escolar digital já é uma realidade, melhore ainda mais o controle pedagógico e financeiro da sua escola com nossa plataforma de gerenciamento escolar.
                        Eleve sua escola para um ambiente remoto gerenciando o corpo discente de qualquer lugar, para mais informações entre em contato conosco e evolua!
                    </p>
                </div>
                <div class="col-sm-4 py-4">
                    <h4 class="text-white">Contato</h4>
                    <ul class="list-unstyled">
                        <li><a href="https://mail.google.com/mail/u/0/?subject=Interessado&to=GEES<plataformagees@gmail.com>&body=Oi!%20Gostaria%20de%20obter%20mais%20detalhes%20sobre%20a%20Plataforma%20de%20Gerenciamento%20Escolar.&view=cm" class="text-white" target="_blank">E-Mail</a></li>
                        <li><a href="https://api.whatsapp.com/send?phone=+5585998522147&text=Oi, Gostaria de conhecer melhor a Plataforma de Gerenciamento Escolar." class="social-icon whatsapp text-white" target="_blank">WhatsApp</a></li>
                        <li><a href="tel:+5585998522147" class="text-white" target="_blank">Telefone</a></li>
                    </ul>
                </div>
            @else
                <!-- usuaario logado -->
                <div class="col-sm-8 py-4">
                    <img src="data:image/png;base64, {{ Auth::user()->escola->logotipo }}" style="border: 0px solid #ddd; border-block: 0px; padding-left: 0px; padding-right: 5px; height: 105px; float: left; margin: 0px 10px 5px 0px;" />
                    <h4 class="text-white">{{ Auth::user()->escola->nome_fantasia }}</h4>
                    <p class="text-muted"><strong>{{ Auth::user()->escola->slogan }}</strong><br />
                        {{ Auth::user()->escola->endereco }}, {{ Auth::user()->escola->bairro }} <br />
                        CEP: {{ Auth::user()->escola->cep }} {{ Auth::user()->escola->cidade }} - {{ Auth::user()->escola->uf }}
                    </p>
                    <p class="text-white">Baixe o Aplicativo da sua Escola no Google Play ou Apple Store.</p>
                </div>
                <div class="col-sm-4 py-4">
                    <h4 class="text-white">Contato</h4>
                    <ul class="list-unstyled">
                        <li><a href="https://mail.google.com/mail/u/0/?subject=Caontato&to={{ Auth::user()->escola->email }}&body=Olá!&view=cm" class="text-white" target="_blank">{{ Auth::user()->escola->email }}</a></li>
                        <li><a href="https://api.whatsapp.com/send?phone={{ Auth::user()->escola->rede_social }}&text=Olá!" class="social-icon whatsapp text-white" target="_blank">WhatsApp</a></li>
                        <li><a href="tel:{{ Auth::user()->escola->telefone }}" class="text-white" target="_blank">Telefone</a></li>
                    </ul>
                </div>
            @endguest
        </div>
    </div>
</div>

<nav class="navbar navbar-inverse bg-inverse">
    <!-- Navbar content -->

        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation" style="margin-top: 5px">
                <span class="navbar-toggler-icon"></span>
            </button>

            @guest
                <a class="navbar-brand" href="/">{{ config('app.name', 'Laravel') }} - Gerenciamento Escolar</a>
            @else
                <a class="navbar-brand active" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}<span class="sr-only">(current)</span></a>

                <div class="d-flex">
                    <div class="dropdown mr-1">
                    <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                        <i class="fa fa-graduation-cap fa-1x" aria-hidden="true"></i>
                        {{ __('Cadastros') }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                        <a class="dropdown-item" href="{{ route('listaAlunos', Auth::user()->cod_esco) }}">Alunos</a>
                        <a class="dropdown-item" href="{{ route('matriculasGeral') }}">Matrículas</a>
                    </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="dropdown mr-1">
                    <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                        <i class="fa fa-graduation-cap fa-1x" aria-hidden="true"></i>
                        {{ __('Cadastros') }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                        <a class="dropdown-item" href="{{ route('listaAlunos', Auth::user()->cod_esco) }}">Alunos</a>
                        <a class="dropdown-item" href="{{ route('matriculasGeral') }}">Matrículas</a>
                    </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="dropdown mr-1">
                    <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                        <i class="fa fa-graduation-cap fa-1x" aria-hidden="true"></i>
                        {{ __('Cadastros') }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                        <a class="dropdown-item" href="{{ route('listaAlunos', Auth::user()->cod_esco) }}">Alunos</a>
                        <a class="dropdown-item" href="{{ route('matriculasGeral') }}">Matrículas</a>
                    </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="dropdown mr-1">
                    <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                        <i class="fa fa-graduation-cap fa-1x" aria-hidden="true"></i>
                        {{ __('Cadastros') }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                        <a class="dropdown-item" href="{{ route('listaAlunos', Auth::user()->cod_esco) }}">Alunos</a>
                        <a class="dropdown-item" href="{{ route('matriculasGeral') }}">Matrículas</a>
                    </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="dropdown mr-1">
                    <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                        <i class="fa fa-graduation-cap fa-1x" aria-hidden="true"></i>
                        {{ __('Cadastros') }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                        <a class="dropdown-item" href="{{ route('listaAlunos', Auth::user()->cod_esco) }}">Alunos</a>
                        <a class="dropdown-item" href="{{ route('matriculasGeral') }}">Matrículas</a>
                    </div>
                    </div>
                </div>

            @endguest
            <!-- Authentication Links -->
            <div class="d-flex">
                <div class="dropdown mr-1">
                    @guest
                        <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                            <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
                            {{ __('Entrar') }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                            <a class="dropdown-item" href="{{ route('home') }}">Login</a>
                        </div>
                        <!--
                        @if (Route::has('register'))
                            <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                                <i class="fa fa-user-circle fa-1x" aria-hidden="true"></i>
                                {{ __('Novo Usuário') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                <a class="dropdown-item" href="{{ route('register') }}">Registro</a>
                            </div>
                        @endif
                        -->

                    @else
                        <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                            <img src="data:image/png;base64, {{ Auth::user()->avatar }}" style="width:36px; height:36px; border-radius:50%" />
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Sair') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </div>
                    @endguest
                </div>
            </div>
            <!-- Administration Links -->
            @guest
            @else
                @if(auth()->user()->hasRole('admin'))
                    <div class="d-flex">
                        <div class="dropdown mr-1">
                            <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                                <i class="fa fa-cog fa-spin fa-2x fa-fw"></i>
                                {{ __('Admistração de Usuários') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                <a class="dropdown-item" href="{{ route('create') }}">Registro</a>
                                <a class="dropdown-item" href="{{ route('index') }}">Lista</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endguest
        </div>
</nav>
