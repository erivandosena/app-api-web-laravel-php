<div class="container">
    <div class="row justify-content-center">
        <!-- <div class="col-md-8" > -->
        <div>
            <div class="card">
                <div class="card-header">Boletim Escolar </div>

                <div class="card-body">

                    <hr />
                    <!--
                    @foreach($dados as $linha)
                    <linha>
                        <h2>{{ $linha->disciplina }}</h2>
                        <p>
                            {{ $linha->resultado_final }}
                        </p>
                    </linha>
                    @endforeach
                    -->
                    @if(!$dados)
                    <div class="alert alert-warning">
                        <p><strong>Boletim não localizado!</strong><br />É necessário listar as matrículas para selecionar uma visualização do boletim.</p>
                    </div>
                    @else
                    <p style="padding: 10px;">
                    <img src="data:image/png;base64, {{ $dados[0]->fotografia }}" alt="Fotografia 3x4" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 120px; float: left; margin: 0px 10px 5px 0px;" />
                    <strong> Aluno:</strong> {{ $dados[0]->nome_aluno }}
                    <strong> Matrícula:</strong> {{ $dados[0]->matricula }} <br />
                    <strong> Curso:</strong> {{ $dados[0]->nome_curso }} <br />
                    <strong> Ano:</strong> {{ $dados[0]->nome_serie }} <br />
                    <strong> Turno:</strong> {{ $dados[0]->nome_turno }} <br />
                    <strong> Turma:</strong> {{ $dados[0]->nome_turma }} <br />
                    <strong> Ano Letivo:</strong> {{ $dados[0]->ano_letivo }}
                    </p>
                    <div style="border:0px solid #ccc; height: auto; width: auto; overflow:hidden;">
                    <li style="list-style: none; font-weight: bold">
                        <span style="display: inline-block; width: 250px; padding: 2px;">Disciplina</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">1ª Etp<br />Média</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">1ª Etp<br />Rec</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">2ª Etp<br />Média</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">2ª Etp<br />Rec</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">3ª Etp<br />Média</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">3ª Etp<br />Rec</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">4ª Etp<br />Média</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">4ª Etp<br />Rec</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">Rec Final</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">Média Final</span>
                        <span style="display: inline-block; width: 150px; padding: 2px;">Resultado Final</span>
                    </li>
                    @foreach($dados as $linha)
                    <li style="list-style: none;">
                        <span style="display: inline-block; width: 250px; padding: 2px;">{{ $linha->disciplina }}</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">{{ $linha->etapa_1_m }}</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">{{ $linha->etapa_1_r }}</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">{{ $linha->etapa_2_m }}</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">{{ $linha->etapa_2_r }}</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">{{ $linha->etapa_3_m }}</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">{{ $linha->etapa_3_r }}</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">{{ $linha->etapa_4_m }}</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">{{ $linha->etapa_4_r }}</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">{{ $linha->provao_r }}</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">{{ $linha->media_final }}</span>
                        <span style="display: inline-block; width: 150px; padding: 2px;">{{ $linha->resultado_final }}</span>
                    </li>
                    @endforeach
                    <br />
                    <a href="{{ route('matriculasAluno', $dados[0]->matricula) }}" class="btn btn-xs btn-info pull-right">Matrículas do Aluno</a>
                    </div>
                    @endif
                </div>
                <hr />
            </div>
        </div>
    </div>
</div>
