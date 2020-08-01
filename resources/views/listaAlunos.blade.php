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
                    <div class="card-header">{{ __('Lista Geral de Alunos') }}</div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><strong></strong></h6>
                        <p class="card-text"><strong></strong></p>

                        <div class="col-sm-12">
                            @if(session()->get('success'))
                                <div class="alert alert-success">
                                {{ session()->get('success') }}
                                </div>
                            @endif
                        </div>

                        @if($dados)
                            <table class="table table-sm">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Telefone fixo</th>
                                    <th scope="col">Telefone móvel</th>
                                    <th scope="col">Responsável</th>
                                    <th scope="col"><i class="far fa-edit"></i></th>
                                    <th scope="col"><i class="far fa-trash-alt"></i></th>
                                    <th scope="col"><i class="far fa-file-alt"></i></th>
                                </tr>
                                </thead>
                                @foreach($dados as $linha)
                                <tbody>
                                <tr>
                                    <th scope="row">{{ $linha->nome_aluno }}</th>
                                    <td>{{ $linha->tel_aluno }}</td>
                                    <td>{{ $linha->tel_cel_aluno }}</td>
                                    <td>{{ $linha->nome_resp }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="location.href='{{ route('editaAluno', $linha->cod_alun) }}'">Editar</button>
                                    </td>
                                    <td>
                                        <form action="{{ route('excluiAluno', $linha->cod_alun)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-primary btn-sm" type="submit">Delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="location.href='{{ route('matriculasAluno', $linha->cod_alun) }}'">Matricula(s)</button>
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
