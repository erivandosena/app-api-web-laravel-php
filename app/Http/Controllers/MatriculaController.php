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

	public function listaMatriculas($nome_ou_matricula) {
        $dados = DB::table('matricula')
        ->select('matricula.cod_matr',
        'matricula.matricula',
        'aluno.nome_aluno',
        'curso.nome_curso',
        'serie.nome_serie',
        'turno.nome_turno',
        'turma.nome_turma',
        'letivo.ano_letivo')
        ->join('aluno','aluno.cod_alun','matricula.cod_alun')
        ->join('curso','curso.cod_curs','matricula.cod_curs')
        ->join('serie','serie.cod_seri','matricula.cod_seri')
        ->join('turno','turno.cod_turn','matricula.cod_turn')
        ->join('turma','turma.cod_turm','matricula.cod_turm')
        ->join('letivo','letivo.cod_leti','matricula.cod_leti')
        ->where('aluno.nome_aluno', $nome_ou_matricula)
        ->orWhere('matricula.matricula', $nome_ou_matricula)
        ->orderByDesc('letivo.ano_letivo')
        ->get();

        if($dados->isEmpty())
            $dados=[];

        return view('matriculasAluno', compact('dados'));
    }

	public function listaTodasMatriculas() {
        $dados = DB::table('matricula')
        ->select('matricula.cod_matr',
        'matricula.matricula',
        'aluno.nome_aluno',
        'curso.nome_curso',
        'serie.nome_serie',
        'turno.nome_turno',
        'turma.nome_turma',
        'letivo.ano_letivo')
        ->join('aluno','aluno.cod_alun','matricula.cod_alun')
        ->join('curso','curso.cod_curs','matricula.cod_curs')
        ->join('serie','serie.cod_seri','matricula.cod_seri')
        ->join('turno','turno.cod_turn','matricula.cod_turn')
        ->join('turma','turma.cod_turm','matricula.cod_turm')
        ->join('letivo','letivo.cod_leti','matricula.cod_leti')
        //->where('aluno.nome_aluno', $nome_ou_matricula)
        //->orWhere('matricula.matricula', $nome_ou_matricula)
        ->orderByDesc('letivo.ano_letivo')
        //->get();
        ->paginate(25);

        if($dados->isEmpty())
            $dados=[];

        return view('matriculasGeral', compact('dados'));
    }

}
