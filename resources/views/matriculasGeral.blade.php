@extends('layouts.layout_padrao')
    @section('content')
        <!-- restante do conteúdo -->
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col">
                    <div class="col-md-auto">
                        <div class="card" style="width: 85rem;">
                            <div class="card-header">Lista Geral de Matrículas</div>
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                                    <p class="card-text"></p>

                                    <?php
                                    //echo sizeof($dados);
                                    ?>
                                    @if(!$dados)
                                    <div class="alert alert-warning">
                                        <p><strong>Matrícula não localizada!</strong><br />Realize matrículas dos alunos cadastrados.</p>
                                    </div>
                                    @else
                                    <table class="table table-sm">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Matrícula</th>
                                            <th scope="col">Curso</th>
                                            <th scope="col">Série</th>
                                            <th scope="col">Turma</th>
                                            <th scope="col">Turno</th>
                                            <th scope="col">Ano Letivo</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        @foreach($dados as $linha)
                                        <tbody>
                                        <tr>
                                            <th>{{ $linha->nome_aluno }}</th>
                                            <td>{{ $linha->matricula }}</td>
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
                                    <!-- controle paginacao -->
                                    <!-- {{ $dados->render() }} -->
                                    {{ $dados->links("pagination::bootstrap-4") }}
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
