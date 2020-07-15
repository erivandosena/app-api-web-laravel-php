@extends('layouts.layout_padrao')
    @section('content')
        <!-- restante do conteúdo -->
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col">
                    <div class="col-md-auto">
                        <div class="card" style="width: 85rem;">
                            <div class="card-header">Boletim de Notas Escolares</div>
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    @if($dados)
                                    <h6 class="card-subtitle mb-2 text-muted"><strong> Aluno:</strong> {{ $dados[0]->nome_aluno }}</h6>
                                    <p class="card-text"><strong> Matrícula:</strong> {{ $dados[0]->matricula }}</p>
                                    <img src="data:image/png;base64, {{ $dados[0]->fotografia }}" alt="Fotografia 3x4" style="border: 1px solid #ddd; border-radius: 4px; padding-left: 0px; padding-right: 5px; width: 120px; float: left; margin: 0px 10px 5px 0px;" />
                                    <strong> Curso:</strong> {{ $dados[0]->nome_curso }} <br />
                                    <strong> Ano:</strong> {{ $dados[0]->nome_serie }} <br />
                                    <strong> Turno:</strong> {{ $dados[0]->nome_turno }} <br />
                                    <strong> Turma:</strong> {{ $dados[0]->nome_turma }} <br />
                                    <strong> Ano Letivo:</strong> {{ $dados[0]->ano_letivo }}
                                    @endif

                                    @if(!$dados)
                                    <div class="alert alert-warning">
                                        <p><strong>Matrícula não localizada!</strong><br />Informe um nome completo ou número de matrícula.</p>
                                    </div>
                                    @else
                                    <table class="table table-sm">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Disciplina</th>
                                            <th scope="col">1ª Etp<br />Média</th>
                                            <th scope="col">1ª Etp<br />Rec</th>
                                            <th scope="col">2ª Etp<br />Média</th>
                                            <th scope="col">2ª Etp<br />Rec</th>
                                            <th scope="col">3ª Etp<br />Média</th>
                                            <th scope="col">3ª Etp<br />Rec</th>
                                            <th scope="col">4ª Etp<br />Média</th>
                                            <th scope="col">4ª Etp<br />Rec</th>
                                            <th scope="col">Rec Final</th>
                                            <th scope="col">Média Final</th>
                                            <th scope="col">Resultado Final</th>
                                        </tr>
                                        </thead>
                                        @foreach($dados as $linha)
                                        <tbody>
                                        <tr>
                                            <td>{{ $linha->disciplina }}</td>
                                            <td>{{ $linha->etapa_1_m }}</td>
                                            <td>{{ $linha->etapa_1_r }}</td>
                                            <td>{{ $linha->etapa_2_m }}</td>
                                            <td>{{ $linha->etapa_2_r }}</td>
                                            <td>{{ $linha->etapa_3_m }}</td>
                                            <td>{{ $linha->etapa_3_r }}</td>
                                            <td>{{ $linha->etapa_4_m }}</td>
                                            <td>{{ $linha->etapa_4_r }}</td>
                                            <td>{{ $linha->provao_r }}</td>
                                            <td>{{ $linha->media_final }}</td>
                                            <td>{{ $linha->resultado_final }}</td>
                                        </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    <hr />
                                    <br />
                                    <a href="{{ route('matriculasAluno', $dados[0]->matricula) }}" class="btn btn-xs btn-info pull-right">Histórico de Matrículas do Aluno</a>
                                    <a href="{{ route('matriculasGeral', $dados[0]->matricula) }}" class="btn btn-xs btn-info pull-right">Lista Geral de Matrículas</a>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
