<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Matricula;
use Illuminate\Support\Facades\DB;

class MatriculaController extends MasterController
{
    protected $model;

    public function __construct(Matricula $matricula, Request $request)
    {
        $this->model = $matricula;
        $this->request = $request;
    }

    public function matriculaCompleta($id)
    {
        if(!$dados = $this->model->with(['aluno','curso','serie','turno','turma','letivo'])->find($id)) {
            return response()->json(['erro' => 'Recurso não locaizado.'], Response::HTTP_NOT_FOUND);
        } else {
            return response()->json($dados, Response::HTTP_OK);
        }
    }

	public function listaMatriculas($id_matricula_nome) {
        $dados = DB::table('matriculas')
        ->select('matriculas.cod_matr',
        'matriculas.matricula',
        'alunos.nome_aluno',
        'cursos.nome_curso',
        'series.nome_serie',
        'turnos.nome_turno',
        'turmas.nome_turma',
        'letivos.ano_letivo',
        'matriculas.cod_esco')
        ->join('alunos','alunos.cod_alun','matriculas.cod_alun')
        ->join('cursos','cursos.cod_curs','matriculas.cod_curs')
        ->join('series','series.cod_seri','matriculas.cod_seri')
        ->join('turnos','turnos.cod_turn','matriculas.cod_turn')
        ->join('turmas','turmas.cod_turm','matriculas.cod_turm')
        ->join('letivos','letivos.cod_leti','matriculas.cod_leti')
        ->where('alunos.cod_alun', intval($id_matricula_nome))
        ->orWhere('matriculas.matricula', $id_matricula_nome)
        ->orWhere('alunos.nome_aluno', $id_matricula_nome)
        ->orderByDesc('letivos.ano_letivo')
        ->get();

        if($dados->isEmpty())
            $dados=[];

        return view('matriculasAluno', compact('dados'));
    }

	public function listaTodasMatriculas() {
        $dados = DB::table('matriculas')
        ->select('matriculas.cod_matr',
        'matriculas.matricula',
        'alunos.nome_aluno',
        'cursos.nome_curso',
        'series.nome_serie',
        'turnos.nome_turno',
        'turmas.nome_turma',
        'letivos.ano_letivo',
        'matriculas.cod_esco')
        ->join('alunos','alunos.cod_alun','matriculas.cod_alun')
        ->join('cursos','cursos.cod_curs','matriculas.cod_curs')
        ->join('series','series.cod_seri','matriculas.cod_seri')
        ->join('turnos','turnos.cod_turn','matriculas.cod_turn')
        ->join('turmas','turmas.cod_turm','matriculas.cod_turm')
        ->join('letivos','letivos.cod_leti','matriculas.cod_leti')
        //->where('aluno.nome_aluno', $nome_ou_matricula)
        //->orWhere('matricula.matricula', $nome_ou_matricula)
        ->orderByDesc('letivos.ano_letivo')
        //->get();
        ->paginate(25);

        if($dados->isEmpty())
            $dados=[];

        return view('matriculasGeral', compact('dados'));
    }

}
