@extends('layouts.layout_principal')

@guest
    <br />
@else
    @section('content')
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <!-- inicio restante do conteúdo -->
                <div class="card">
                    <div class="card-header">{{ __('Lista Geral de Usuários') }}</div>
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
                        <!-- inicio mensagens -->
                        @if($dados)
                            <table class="table table-sm">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">E-Mail</th>
                                    <th scope="col">Escola</th>
                                    <th scope="col">Avatar</th>
                                    <th scope="col"><i class="far fa-edit"></i></th>
                                    <th scope="col"><i class="far fa-trash-alt"></i></th>
                                    <th scope="col"><i class="fas fa-camera"></i></th>
                                    <th scope="col"><i class="fas fa-user-lock"></i></th>
                                </tr>
                                </thead>
                                @foreach($dados as $linha)
                                <tbody>
                                <tr>
                                    <th scope="row">{{ $linha->name }}</th>
                                    <td>{{ $linha->email }}</td>
                                    <td>{{ $linha->nome_fantasia }}</td>
                                    <td><img src="data:image/png;base64, {{ $linha->avatar }}" alt="Foto" style="width:29px; height:29px; border-radius:50%" /></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="location.href='{{ route('edit', $linha->id) }}'">Editar</button>
                                    </td>
                                    <td>
                                        <form action="{{ route('destroy', $linha->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-primary btn-sm" type="submit">Excluir</button>
                                        </form>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="location.href='{{ route('matriculasAluno', $linha->id) }}'">Avatar</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="location.href='{{ route('matriculasAluno', $linha->id) }}'">Permissões</button>
                                    </td>
                                </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <!-- controle paginacao -->
                            {{ $dados->render() }}
                            <!-- controle paginacao -->
                        @endif
                    </div>
                </div>
                <!-- fim restante do conteúdo -->
            </div>
        </div>
    </div>
    @endsection
@endguest
