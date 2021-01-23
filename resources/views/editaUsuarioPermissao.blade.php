@extends('layouts.layout_principal')

@guest
    <br />
@else
    @section('content')
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <!-- inicio restante do conteúdo -->
                <div class="card" style="margin:50px;">
                    <div class="card-header">Permissões do Usuário</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $dados['usuario'][0]->name }}</h5>
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
                        <div class="row">
                            <div class="col">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <form action="{{ route('storeUsuarioPermissao') }}" method="POST">
                                            @csrf
                                            <input id="id_invisible" type="hidden" name="usuario_id" value="{{ $dados['usuario'][0]->id }}">
                                            <label for="permissao">{{ __('Permissão') }}</label>
                                            <select id="permissao" class="form-control mb-3" name="permissao_id">
                                                <option value="">Selecione a permissão</option>
                                                @foreach ($dados['permissoes'] as $permisao)
                                                    <option value="{{ $permisao->id }}"> {{ $permisao->name }} </option>
                                                @endforeach
                                            </select>
                                            @error('permissao')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <button style="cursor:pointer" type="submit" class="btn btn-primary">Adicionar</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12">
                                        <label for="permissoes">{{ __('Permissões (Funções do usuário)') }}</label>
                                        @if($dados['usuario_permissoes'])
                                            <table id="permissoes" class="table table-sm">
                                                <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col"><i class="far fa-trash-alt"></i></th>
                                                </tr>
                                                </thead>
                                                @foreach($dados['usuario_permissoes'] as $linha)
                                                <tbody>
                                                <tr>
                                                    <th scope="row">{{ $linha->name }}</th>
                                                    <td>
                                                        <form action="{{ route('destroyUsuarioPermissao', $linha->permissao_id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input id="id_invisible" type="hidden" name="usuario_id" value="{{ $linha->usuario_id }}">
                                                            <button type="button" class="btn btn-outline-primary btn-sm" type="submit" data-toggle="modal" data-target="#confirmDelete" data-record-id="{{ $linha->permissao_id }}" data-record-title="{{ $linha->name }}">Excluir</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                @endforeach
                                            </table>
                                            <!-- controle paginacao -->
                                            {{ $dados['usuario_permissoes']->render() }}
                                            <!-- controle paginacao -->
                                        @endif
                                        <hr />
                                        <a href="{{ route('index') }}" class="btn btn-xs btn-info pull-right">Lista de Usuarios</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-row">
                                    <div class="col-sm-12">
                                        <label for="papeis">{{ __('Cargos (Papeis)') }}</label>
                                        @foreach($dados['papeis'] as $linha)
                                            <ul id="papeis" class="list-group">
                                                <li class="list-group-item" style="height: 38px; padding: 5px 10px 5px 15px;">{{ $linha->name }}</li>
                                            </ul>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fim restante do conteúdo -->
            </div>
        </div>
    </div>
    @endsection
@endguest
