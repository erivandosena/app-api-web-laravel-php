<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Aluno;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AlunoController extends MasterController
{
    protected $model;

    public function __construct(Aluno $aluno, Request $request)
    {
        $this->model = $aluno;
        $this->request = $request;
    }

	public function editaCadastroAluno($id) {
        $dados = $this->model->findOrFail($id);
        return view('editaAluno', compact('dados'));
    }

	public function atualizaCadastroAluno(Request $request, $id)
    {
        $dados = $this->model->findOrFail($id);
        $dataform = $request->all();

        //$dataform['data_cadastro'] = Carbon::now()->format('Y-m-d H:i:s');
        if(!empty($request->input('data_nascimento')))
            $dataform['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $request->input('data_nascimento'))->format('Y-m-d');
        if(!empty($request->input('data_nasc_pai')))
            $dataform['data_nasc_pai'] = Carbon::createFromFormat('d/m/Y', $request->input('data_nasc_pai'))->format('Y-m-d');
        if(!empty($request->input('data_nasc_mae')))
            $dataform['data_nasc_mae'] = Carbon::createFromFormat('d/m/Y', $request->input('data_nasc_mae'))->format('Y-m-d');
        if(!empty($request->input('data_nasc_resp')))
            $dataform['data_nasc_resp'] = Carbon::createFromFormat('d/m/Y', $request->input('data_nasc_resp'))->format('Y-m-d');
        if(!empty($request->input('renda_pai')))
            $dataform['renda_pai'] = floatval($request->input('renda_pai'));
        if(!empty($request->input('renda_mae')))
            $dataform['renda_mae'] = floatval($request->input('renda_mae'));
        if(!empty($request->input('renda_resp')))
            $dataform['renda_resp'] = floatval($request->input('renda_resp'));

        $validator = Validator::make($dataform, $this->model->rules($id))->validate();
        //dd($validator);
        $dados->update($validator);

        return redirect('alunos/edita/'. $dados->cod_alun)->with('success', 'Cadastro atualizado!');
    }

	public function excluiCadastroAluno($id)
    {
        $dados = $this->model->findOrFail($id);
        $id_escola = $dados->cod_esco;
        $dados->delete('cascade');

        return redirect('alunos/'. $id_escola)->with('success', 'Cadastro excluído!');
    }

	public function listaTodosAlunos($cod_esco) {
        $dados = DB::table('alunos')
        /*
        ->select('alunos.cod_alun', 'alunos.nome_aluno', 'alunos.rg', 'alunos.cpf', 'alunos.foto', 'alunos.data_nascimento', 'alunos.naturalidade', 'alunos.estado_naturalidade', 'alunos.nacionalidade',
                'alunos.endereco', 'alunos.bairro', 'alunos.cidade', 'alunos.cep', 'alunos.estado', 'alunos.uf', 'alunos.tel_aluno', 'alunos.tel_cel_aluno', 'alunos.sexo', 'alunos.religiao', 'alunos.escola_anterior', 'alunos.cidade_esco_ant', 'alunos.estado_esco_ant', 'alunos.uf_esco_ant', 'alunos.tel_esco_ant', 'alunos.problemas_saude', 'alunos.remedios_proibidos', 'alunos.remedios_utilizados',
                'alunos.nome_pai', 'alunos.data_nasc_pai', 'alunos.nacionalidade_pai', 'alunos.naturalidade_pai', 'alunos.rg_pai', 'alunos.cpf_pai', 'alunos.tel_pai', 'alunos.tel_trab_pai', 'alunos.tel_cel_pai', 'alunos.local_trab_pai', 'alunos.profissao_pai', 'alunos.renda_pai', 'alunos.endereco_pai', 'alunos.bairro_pai', 'alunos.cidade_pai', 'alunos.cep_pai', 'alunos.estado_pai', 'alunos.uf_pai',
                'alunos.nome_mae', 'alunos.data_nasc_mae', 'alunos.nacionalidade_mae', 'alunos.naturalidade_mae', 'alunos.rg_mae', 'alunos.cpf_mae', 'alunos.tel_mae', 'alunos.tel_trab_mae', 'alunos.tel_cel_mae', 'alunos.local_trab_mae', 'alunos.profissao_mae', 'alunos.renda_mae', 'alunos.endereco_mae', 'alunos.bairro_mae', 'alunos.cidade_mae', 'alunos.cep_mae', 'alunos.estado_mae', 'alunos.uf_mae',
                'alunos.nome_resp', 'alunos.data_nasc_resp', 'alunos.nacionalidade_resp', 'alunos.naturalidade_resp', 'alunos.rg_resp', 'alunos.cpf_resp', 'alunos.tel_resp', 'alunos.tel_trab_resp', 'alunos.tel_cel_resp', 'alunos.local_trab_resp', 'alunos.profissao_resp', 'alunos.renda_resp', 'alunos.endereco_resp', 'alunos.bairro_resp', 'alunos.cidade_resp', 'alunos.cep_resp', 'alunos.estado_resp', 'alunos.uf_resp',
                'alunos.situacao_aluno', 'alunos.data_cadastro', 'alunos.fotografia', 'alunos.email', 'alunos.cod_esco','escolas.nome_fantasia')
        */
        ->select('alunos.*', 'escolas.nome_fantasia')
        ->join('escolas','escolas.cod_esco','alunos.cod_esco')
        ->where('alunos.cod_esco', $cod_esco)
        ->orderByDesc('alunos.nome_aluno')
         ->paginate(25);

        if($dados->isEmpty())
            $dados=[];

        return view('listaAlunos', compact('dados'));
    }

}
