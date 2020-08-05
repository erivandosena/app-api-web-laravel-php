@extends('layouts.layout_principal')

@guest
    <br />
@else
    @section('content')
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <!-- inicio restante do conteúdo -->
                <div class="card" style="margin: 55px;">
                    <div class="card-header">Cadastro de Usuário</div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><strong></strong></h6>
                        <p class="card-text"><small class="text-muted"></small></p>
                        <!-- inicio mensagens -->
                        <div class="col-sm-12">
                            @if(session()->get('success'))
                                <div class="alert alert-success">
                                {{ session()->get('success') }}
                                </div>
                            @endif
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </div>
                        @endif
                        <!-- Fim mensagens -->
                        <form method="POST" action="{{ route('store') }}">
                            {{ csrf_field() }}
                            @include('formUsuario')
                        </form>
                        <hr />
                        <a href="{{ route('index') }}" class="btn btn-xs btn-info pull-right">Lista de Usuarios</a>
                    </div>
                    </div>
                </div>
                <!-- fim restante do conteúdo -->
            </div>
        </div>
    </div>
    @endsection
@endguest
