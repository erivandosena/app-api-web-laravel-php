@extends('layouts.layout_padrao')
    @section('content')
        <!-- restante do conteúdo -->
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col">
                    <div class="col-md-auto">
                        <div class="card" style="width: 85rem;">
                            <div class="card-header">Cadastro @if($dados) de <strong> {{ $dados->nome_aluno }} </strong> @endif</div>
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

                                    @if($dados)
                                    <form method="post" action="{{ route('atualizaAluno', $dados->cod_alun ) }}">
                                        @csrf
                                        @method('PUT')
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Dados do Aluno</a>
                                                <a class="nav-item nav-link" id="nav-cad1-tab" data-toggle="tab" href="#nav-cad1" role="tab" aria-controls="nav-cad1" aria-selected="false">Dados da Mãe </a>
                                                <a class="nav-item nav-link" id="nav-cad2-tab" data-toggle="tab" href="#nav-cad2" role="tab" aria-controls="nav-cad2" aria-selected="false">Dados do Pai</a>
                                                <a class="nav-item nav-link" id="nav-cad3-tab" data-toggle="tab" href="#nav-cad3" role="tab" aria-controls="nav-cad3" aria-selected="false">Dados do Responsável</a>
                                                <a class="nav-item nav-link" id="nav-cad4-tab" data-toggle="tab" href="#nav-cad4" role="tab" aria-controls="nav-cad4" aria-selected="false">Dados Censo Escolar</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <!-- Inicio info aluno -->

                                                <div class="form-row">
                                                    <div class="form-group col-md-8">
                                                      <label for="inputNome">Nome</label>
                                                      <input type="text" class="form-control" id="inputNome" placeholder="Nome completo" name="nome_aluno" value="{{ $dados->nome_aluno }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                      <label for="inputNascimento">Nascimento</label>
                                                      <input type="text" class="form-control" id="inputNascimento" placeholder="dd/mm/aaaa" name="data_nascimento" value="{{ Carbon\Carbon::parse($dados->data_nascimento)->format('d/m/Y') }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputSexo">Gênero</label>
                                                        <select class="form-control" id="inputSexo" name="sexo">
                                                            <option value="">Selecione o gênero</option>
                                                            <option value="MASCULINO" @if ($dados->sexo == "MASCULINO") {{ 'selected' }} @endif>MASCULINO</option>
                                                            <option value="FEMININO" @if ($dados->sexo == "FEMININO") {{ 'selected' }} @endif>FEMININO</option>
                                                        </select>


                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                      <label for="inputNacionlidade">Nacionalidade</label>
                                                      <input type="text" class="form-control" id="inputNacionlidade" placeholder="Brasileiro(a)/Estrangeiro" name="nacionalidade" value="{{ $dados->nacionalidade }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                      <label for="inputNaturalidade">Naturalidade</label>
                                                      <input type="text" class="form-control" id="inputNaturalidade" placeholder="Cidade onde nasceu" name="naturalidade" value="{{ $dados->naturalidade }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputEstadoNaturalidade">Estado Naturalidade</label>
                                                        <input type="text" class="form-control" id="inputEstadoNaturalidade" placeholder="Estado onde nasceu" name="estado_naturalidade" value="{{ $dados->estado_naturalidade }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputTelefoneFixo">Telefone Fixo</label>
                                                        <input type="text" class="form-control" id="inputTelefoneFixo" placeholder="(xx) xxxx-xxxx" name="tel_aluno" value="{{ $dados->tel_aluno }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputTelefoneMovel">Telefone Móvel</label>
                                                        <input type="text" class="form-control" id="inputTelefoneMovel" placeholder="(xx) xxxxx-xxxx" name="tel_cel_aluno" value="{{ $dados->tel_cel_aluno }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputCidade">Cidade</label>
                                                        <input type="text" class="form-control" id="inputCidade" placeholder="Cidade onde reside" name="cidade" value="{{ $dados->cidade }}">
                                                      </div>
                                                </div>

                                                <!--
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                      <label for="inputEmail4">Email</label>
                                                      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      <label for="inputPassword4">Senha</label>
                                                      <input type="password" class="form-control" id="inputPassword4" placeholder="Senha">
                                                    </div>
                                                </div>
                                                -->

                                                <!-- Fim info aluno -->
                                            </div>
                                            <div class="tab-pane fade" id="nav-cad1" role="tabpanel" aria-labelledby="nav-cad1-tab">
                                                <!-- Inicio info Mae -->
                                                Mãe
                                                <!-- Fim info Mae -->
                                            </div>
                                            <div class="tab-pane fade" id="nav-cad2" role="tabpanel" aria-labelledby="nav-cad2-tab">
                                                <!-- Inicio info Pai -->
                                                Pai
                                                <!-- Fim info Pai -->
                                            </div>
                                            <div class="tab-pane fade" id="nav-cad3" role="tabpanel" aria-labelledby="nav-cad3-tab">
                                                <!-- Inicio info Responsavel -->
                                                Responsável
                                                <!-- Fim info Responsavel -->
                                            </div>
                                            <div class="tab-pane fade" id="nav-cad4" role="tabpanel" aria-labelledby="nav-cad4-tab">
                                                <!-- Inicio info Censo -->
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                      <label for="inputNome">CPF</label>
                                                      <input type="text" class="form-control" id="inputNome" placeholder="999.999.999-99" name="cpf" value="{{ $dados->cpf }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                      <label for="inputNascimento">RG</label>
                                                      <input type="text" class="form-control" id="inputNascimento" placeholder="Registro geral" name="rg" value="{{ $dados->rg }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputReligiao">Religião</label>
                                                        <select class="form-control" id="inputReligiao" name="religiao">
                                                            <option value="">Selecione a religião</option>
                                                            <option value="ADVENTISTA" @if ($dados->religiao == "ADVENTISTA") {{ 'selected' }} @endif>ADVENTISTA</option>
                                                            <option value="ANANDA MARGA" @if ($dados->religiao == "ANANDA MARGA") {{ 'selected' }} @endif>ANANDA MARGA</option>
                                                            <option value="ANGLICANISMO" @if ($dados->religiao == "ANGLICANISMO") {{ 'selected' }} @endif>ANGLICANISMO</option>
                                                            <option value="BUDISTA" @if ($dados->religiao == "BUDISTA") {{ 'selected' }} @endif>BUDISTA</option>
                                                            <option value="CANDOMBLÉ" @if ($dados->religiao == "CANDOMBLÉ") {{ 'selected' }} @endif>CANDOMBLÉ</option>
                                                            <option value="CATÓLICA" @if ($dados->religiao == "CATÓLICA") {{ 'selected' }} @endif>CATÓLICA</option>
                                                            <option value="CONFUCIONISMO" @if ($dados->religiao == "CONFUCIONISMO") {{ 'selected' }} @endif>CONFUCIONISMO</option>
                                                            <option value="DODECATEÍSMO" @if ($dados->religiao == "DODECATEÍSMO") {{ 'selected' }} @endif>DODECATEÍSMO</option>
                                                            <option value="ESPÍRITA" @if ($dados->religiao == "ESPÍRITA") {{ 'selected' }} @endif>ESPÍRITA</option>
                                                            <option value="EVANGÉLICO" @if ($dados->religiao == "EVANGÉLICO") {{ 'selected' }} @endif>EVANGÉLICO</option>
                                                            <option value="FÉ BAHÁ'Í" @if ($dados->religiao == "FÉ BAHÁ'Í") {{ 'selected' }} @endif>FÉ BAHÁ'Í</option>
                                                            <option value="HINDUÍSTA" @if ($dados->religiao == "HINDUÍSTA") {{ 'selected' }} @endif>HINDUÍSTA</option>
                                                            <option value="ISLAMISMO" @if ($dados->religiao == "ISLAMISMO") {{ 'selected' }} @endif>ISLAMISMO</option>
                                                            <option value="JAINISMO" @if ($dados->religiao == "JAINISMO") {{ 'selected' }} @endif>JAINISMO</option>
                                                            <option value="JUDAÍSMO" @if ($dados->religiao == "JUDAÍSMO") {{ 'selected' }} @endif>JUDAÍSMO</option>
                                                            <option value="KONKOKYO" @if ($dados->religiao == "KONKOKYO") {{ 'selected' }} @endif>KONKOKYO</option>
                                                            <option value="MAÇONARIA" @if ($dados->religiao == "MAÇONARIA") {{ 'selected' }} @endif>MAÇONARIA</option>
                                                            <option value="MESSIÂNICA" @if ($dados->religiao == "MESSIÂNICA") {{ 'selected' }} @endif>MESSIÂNICA</option>
                                                            <option value="MORMONISMO" @if ($dados->religiao == "MORMONISMO") {{ 'selected' }} @endif>MORMONISMO</option>
                                                            <option value="PANTEÍSMO" @if ($dados->religiao == "PANTEÍSMO") {{ 'selected' }} @endif>PANTEÍSMO</option>
                                                            <option value="PROTESTANTE" @if ($dados->religiao == "PROTESTANTE") {{ 'selected' }} @endif>PROTESTANTE</option>
                                                            <option value="RASTAFARIANISMO" @if ($dados->religiao == "RASTAFARIANISMO") {{ 'selected' }} @endif>RASTAFARIANISMO</option>
                                                            <option value="SATANISMO" @if ($dados->religiao == "SATANISMO") {{ 'selected' }} @endif>SATANISMO</option>
                                                            <option value="SEICHO-NO-IE" @if ($dados->religiao == "SEICHO-NO-IE") {{ 'selected' }} @endif>SEICHO-NO-IE</option>
                                                            <option value="SIKHISMO" @if ($dados->religiao == "SIKHISMO") {{ 'selected' }} @endif>SIKHISMO</option>
                                                            <option value="TAOÍSMO" @if ($dados->religiao == "TAOÍSMO") {{ 'selected' }} @endif>TAOÍSMO</option>
                                                            <option value="TENRIKYO" @if ($dados->religiao == "TENRIKYO") {{ 'selected' }} @endif>TENRIKYO</option>
                                                            <option value="TESTEMUNHA DE JEOVÁ" @if ($dados->religiao == "TESTEMUNHA DE JEOVÁ") {{ 'selected' }} @endif>TESTEMUNHA DE JEOVÁ</option>
                                                            <option value="THELEMA" @if ($dados->religiao == "THELEMA") {{ 'selected' }} @endif>THELEMA</option>
                                                            <option value="UMBANDA" @if ($dados->religiao == "UMBANDA") {{ 'selected' }} @endif>UMBANDA</option>
                                                            <option value="UNIÃO DO VEGETAL" @if ($dados->religiao == "UNIÃO DO VEGETAL") {{ 'selected' }} @endif>UNIÃO DO VEGETAL</option>
                                                            <option value="WICCA" @if ($dados->religiao == "WICCA") {{ 'selected' }} @endif>WICCA</option>
                                                            <option value="XINTOÍSMO" @if ($dados->religiao == "XINTOÍSMO") {{ 'selected' }} @endif>XINTOÍSMO</option>
                                                            <option value="ZOROASTRISMO" @if ($dados->religiao == "ZOROASTRISMO") {{ 'selected' }} @endif>ZOROASTRISMO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Fim info Censo -->
                                            </div>
                                        </div>
                                        <br />
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </form>
                                    @endif
                                    <hr />
                                    <a href="{{ route('listaAlunos', $dados->cod_esco) }}" class="btn btn-xs btn-info pull-right">Lista de Alunos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
