@extends('layouts.layout_principal')

@guest
    <br />
@else
    @section('content')
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <!-- inicio restante do conteúdo -->
                <div class="card" style="margin: 150px;">
                    <div class="card-header">{{ __('Histórico de Matrículas') }}</div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><strong></strong></h6>
                        <p class="card-text"><strong></strong></p>

                        @if($dados)
                        <h6 class="card-subtitle mb-2 text-muted"><strong> Aluno:</strong> {{ $dados[0]->nome_aluno }}</h6>
                        <p class="card-text"><strong> Matrícula:</strong> {{ $dados[0]->matricula }}</p>
                        @endif

                        @if(!$dados)
                        <div class="alert alert-warning">
                            <p><strong>Matrícula não localizada!</strong><br />Informe um nome completo ou número de matrícula.</p>
                        </div>
                        @else
                        <table class="table table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Curso</th>
                                <th scope="col">Série</th>
                                <th scope="col">Turma</th>
                                <th scope="col">Turno</th>
                                <th scope="col">Ano Letivo</th>
                                <th scope="col"><i class="fa fa-id-card" aria-hidden="true"></i></th>
                            </tr>
                            </thead>
                            @foreach($dados as $linha)
                            <tbody>
                            <tr>
                                <td>{{ $linha->nome_curso }}</td>
                                <td>{{ $linha->nome_serie }}</td>
                                <td>{{ $linha->nome_turma }}</td>
                                <td>{{ $linha->nome_turno }}</td>
                                <td>{{ $linha->ano_letivo}}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="location.href='{{ route('boletimEscolar', $linha->cod_matr) }}'">Visualizar Boletim</button>
                                </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                        <hr />
                        <br />
                        <a href="{{ route('matriculasGeral', $dados[0]->matricula) }}" class="btn btn-xs btn-info pull-right">Lista de Matrículas</a>
                        <a href="{{ route('listaAlunos', $dados[0]->cod_esco) }}" class="btn btn-xs btn-info pull-right">Lista de Alunos</a>
                        @endif
                    </div>
                </div>
                <!-- fim restante do conteúdo -->
            </div>
        </div>
    </div>
    @endsection
@endguest
