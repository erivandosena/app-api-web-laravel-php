<div class="container">
    <div class="row justify-content-center">
        <!-- <div class="col-md-8" > -->
        <div>
            <div class="card">
                <div class="card-header">Lista Matrículas </div>

                <div class="card-body">

                    <hr />
                    <?php
                    //echo sizeof($dados);
                    ?>
                    @if(!$dados)
                    <div class="alert alert-warning">
                        <p><strong>Matrícula não localizada!</strong><br />Informe um nome completo ou número de matrícula.</p>
                    </div> 
                    @else
                    <p style="padding: 10px;">
                    <strong> Aluno:</strong> {{ $dados[0]->nome_aluno }} 
                    <strong> Matrícula:</strong> {{ $dados[0]->matricula }} <!-- <br />
                    <strong> Curso:</strong> {{ $dados[0]->nome_curso }} <br />
                    <strong> Ano:</strong> {{ $dados[0]->nome_serie }} <br />
                    <strong> Turno:</strong> {{ $dados[0]->nome_turno }} <br />
                    <strong> Turma:</strong> {{ $dados[0]->nome_turma }} <br />
                    <strong> Ano Letivo:</strong> {{ $dados[0]->ano_letivo }}
                    -->
                    </p>
                    <div style="border:0px solid #ccc; height: auto; width: auto; overflow:hidden;">
                    <li style="list-style: none; font-weight: bold">
                        <span style="display: inline-block; width: 200px; padding: 2px;">Curso</span>
                        <span style="display: inline-block; width: 100px; padding: 2px;">Série</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">Turma</span>
                        <span style="display: inline-block; width: 80px; padding: 2px;">Turno</span>
                        <span style="display: inline-block; width: 80px; padding: 2px;">Ano Letivo</span>
                        <span style="display: inline-block; width: 145px; padding: 2px;"></span>
                    </li>
                    @foreach($dados as $linha)
                    <li style="list-style: none;">
                        <span style="display: inline-block; width: 200px; padding: 2px;">{{ $linha->nome_curso }}</span>
                        <span style="display: inline-block; width: 100px; padding: 2px;">{{ $linha->nome_serie }}</span>
                        <span style="display: inline-block; width: 50px; padding: 2px;">{{ $linha->nome_turma }}</span>
                        <span style="display: inline-block; width: 80px; padding: 2px;">{{ $linha->nome_turno }}</span>
                        <span style="display: inline-block; width: 80px; padding: 2px;">{{ $linha->ano_letivo}}</span>
                        <span style="display: inline-block; width: 110x; padding: 2px;"><a href="{{ route('boletimEscolar', $linha->cod_matr) }}" class="btn btn-xs btn-info pull-right">Visualizar Boletim</a></span>
                    </li>
                    @endforeach
                    </div>
                    @endif

                </div>
                <hr />
            </div>
        </div>
    </div>
</div>
